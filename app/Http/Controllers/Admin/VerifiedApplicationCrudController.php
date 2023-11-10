<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VerifiedApplicationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Lang;
use App\Models\Info;
use App\Models\VerifiedApplication;
use Datetime;

/**
 * Class VerifiedApplicationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VerifiedApplicationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\VerifiedApplication::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/verified-application');
        CRUD::setEntityNameStrings('verified application', 'verified applications');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (! $this->crud->getRequest()->has('total_score')){
            $this->crud->orderBy('total_score', 'desc');
        }
        CRUD::column('nric');
        CRUD::column('full_name');
        CRUD::column('rank_score');
        CRUD::column('experience_score');
        CRUD::column('age_score');
        CRUD::column('total_score');
        CRUD::setFromDb(); // set columns from db columns.
        
        CRUD::addButtonFromView('line', 'show_info', 'showInfo', 'beginning');
        CRUD::orderButtons('line', [ 'show_info', 'show', 'delete']);
        CRUD::removeButtonFromStack('update','line');
        CRUD::removeAllButtonsFromStack('top');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(VerifiedApplicationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    
    public function verify(string $id)
    {
        $data = Info::find($id);
        // Initialize score 
        $total_score = 0;

        // Helper for selects
        function getScoreForSelects(string $fieldCode, string $selectValue ) : int {
            $en_select_options = Lang::get('messages.'.$fieldCode,[],'en');
            $mm_select_options = Lang::get('messages.'.$fieldCode,[],'mm');
            $scores = config('rules.'.$fieldCode.'_SCORES');
            $en_index = array_search($selectValue, $en_select_options);
            $mm_index = array_search($selectValue, $mm_select_options);
            $index = strlen($en_index)===0 ? $mm_index : $en_index;
            return strlen($index)===0 ? 0 :$scores[$index];
        }

        function howLongHasItBeen(string $from) {
            $fromDate = new DateTime($from);
            $toDate = new DateTime();
            $interval = $fromDate->diff($toDate);
            $years = $interval->y;
            $months = $interval->m;
            return $years===0 ? $months/12 : $years;
        }

        // Get score for rank
        $total_score += $rank_score = getScoreForSelects('RANKS', $data->rank);
        
        // Get score for experience
        $total_score += $experience_score = config('rules.GET_SCORE_FOR_EXPERIENCE')($data->experience)?? 0;

        // Get score for age
        $total_score += $age_score = config('rules.GET_SCORE_FOR_AGE')($data->age) ?? 0;

        // Get score for family count
        $total_score += $family_count_score = config('rules.GET_SCORE_FOR_FAMILY_COUNT')($data->family_count)?? 0;
        
        // Get score for accomodation
        $total_score += $accomodation_situation_score = getScoreForSelects('ACCOMODATION_SITUATIONS', $data->accomodation_situation);
       
        // Get score for family count
        $total_score += $elders_and_kids_count_score = config('rules.GET_SCORE_FOR_ELDERS_AND_KIDS_COUNT')($data->elders_and_kids_count)?? 0; 
        
        // Get score for wait time
        $total_score += $physically_form_submitted_date_score = config('rules.GET_SCORE_FOR_WAIT_SINCE_FORM_SUBMITTED')(howLongHasItBeen($data->physically_form_submitted_date));
        
        // Get score for staying long
        $total_score += $moved_to_state_date_score = config('rules.GET_SCORE_FOR_WAIT_SINCE_MOVED_TO_STATE')(howLongHasItBeen($data->moved_to_state_date));
        
        $total_score += $both_couple_are_staffs_in_same_city_score = ($data->both_couple_are_staffs_in_same_city === "Yes") ? config('rules.WORK_IN_PAIRS_SCORES'): 0;


        // Create a new record in the database
        VerifiedApplication::create([
            'nric' => $data->nric,
            'full_name'=>$data->full_name,
            'age_score'=>$age_score,
            'experience_score'=>$experience_score,
            'rank_score'=>$rank_score,
            'family_count_score'=>$family_count_score,
            'elders_and_kids_count_score'=>$elders_and_kids_count_score,
            'accomodation_situation_score'=>$accomodation_situation_score,
            'physically_form_submitted_date_score'=>$physically_form_submitted_date_score,
            'moved_to_state_date_score'=>$moved_to_state_date_score,
            'both_couple_are_staffs_in_same_city_score'=>$both_couple_are_staffs_in_same_city_score,
            'special_situation_score'=>0,
            'total_score'=>$total_score
        ]);

        if($data->special_situation)
            echo'
            <script>
                let value = prompt("Special Situation : '.$data->special_situation.'\n\nPlease enter the score for the situation 0-15.");
                while (value < 0 || value >15) 
                    value = prompt("Special Situation : '.$data->special_situation.'\n\nPlease enter the score for the situation 0-15.");
                window.location="/admin/'.$data->id.'/addScore/"+value;
            </script>';
        else
            echo'
            <script>
                window.location="/admin/'.$data->id.'/addScore/0";
            </script>';
    }

    public function add(string $id, string $score)
    {
        $original_row = Info::find($id);
        if($score>0){
            $verified_row = VerifiedApplication::where('nric', $original_row->nric)->first();
            $verified_row->update(['total_score'=> $verified_row->total_score + $score]);
            $verified_row->update(['special_situation_score'=> $score]);
        }

        $original_row->update(['verified'=> true]);
        echo'
        <script>
            window.location="/admin/info";
        </script>';
    }

    
    // override delete method
    public function destroy($id)
    {
        CRUD::hasAccessOrFail('delete');
        $verified_row  = VerifiedApplication::find($id);
        $original_row = Info::where('nric', $verified_row->nric)->first();
        $original_row->update(['verified'=> false]);
        return CRUD::delete($id);
    }
}
