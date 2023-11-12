<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InfoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\VerifiedApplication;
use App\Models\Info;

/**
 * Class InfoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InfoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Info::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/info');
        CRUD::setEntityNameStrings('info', 'application information');

        CRUD::field('full_name');
        CRUD::field('nrc');
        CRUD::field('age');
        CRUD::field('experience');
        CRUD::field([   // select_from_array
            'name'        => 'rank',
            'label'       => "Rank",
            'type'        => 'select_from_array',
            'options'     => array_combine(__('messages.RANKS'),__('messages.RANKS')),
            'allows_null' => false,
        ]);
        CRUD::field('family_count');
        CRUD::field('elders_and_kids_count');
        CRUD::field([   // select_from_array
            'name'        => 'accomodation_situation',
            'label'       => "Accomodation Situation",
            'type'        => 'select_from_array',
            'options'     => array_combine(__('messages.ACCOMODATION_SITUATIONS'),__('messages.ACCOMODATION_SITUATIONS')),
            'allows_null' => false,
        ]);
        CRUD::field('physically_form_submitted_date');
        CRUD::field('moved_to_state_date');
        CRUD::field([   // select_from_array
            'name'        => 'both_couple_are_staffs_in_same_city',
            'label'       => "Both are staffs in same city",
            'type'        => 'select_from_array',
            'options'     => ['No'=>'No','Yes'=>'Yes'],
            'allows_null' => false,
        ]);
        CRUD::field('special_situation')->type('textarea');
        CRUD::field('verified')->type('hidden');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (! $this->crud->getRequest()->has('verified')){
            $this->crud->orderBy('verified', 'asc');
        }
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::addButtonFromView('line', 'verify_application', 'verifyApp', 'beginning');
        CRUD::orderButtons('line', [ 'verify_application','show','update','delete']);

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
        CRUD::setValidation(InfoRequest::class);
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
    public function getInfo(string $id)
    {
        $score_row = VerifiedApplication::find($id);
        $info_row = Info::where('nrc', $score_row->nrc)->first();
        // echo $info_row;
        echo '
        <script>
            window.location="/admin/info/'.$info_row->id.'/show";
        </script>';
    }

    // override delete method
    public function destroy($id)
    {
        CRUD::hasAccessOrFail('delete');
        $info_row = Info::find($id);
        $score_row = VerifiedApplication::where('nrc', $info_row->nrc)->first();
        if($score_row)
            $score_row->delete();
        return CRUD::delete($id);
    }
}
