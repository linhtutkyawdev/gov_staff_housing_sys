<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InfoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\VerifiedApplication;

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
        CRUD::field('nric');
        CRUD::field('age');
        CRUD::field('experience');
        CRUD::field([   // select_from_array
            'name'        => 'rank',
            'label'       => "Rank",
            'type'        => 'select_from_array',
            'options'     => ['one' => 'One', 'two' => 'Two'],
            'allows_null' => false,
        ]);
        CRUD::field('family_count');
        CRUD::field('elders_and_kids_count');
        CRUD::field([   // select_from_array
            'name'        => 'accomodation_situation',
            'label'       => "Accomodation Situation",
            'type'        => 'select_from_array',
            'options'     => ['one' => 'One', 'two' => 'Two'],
            'allows_null' => false,
        ]);
        CRUD::field('physically_form_submitted_date');
        CRUD::field('moved_to_state_date');
        CRUD::field([   // select_from_array
            'name'        => 'both_couple_are_staffs_in_same_city',
            'label'       => "Both are staffs in same city",
            'type'        => 'select_from_array',
            'options'     => ['No' => 'No','Yes' => 'Yes'],
            'allows_null' => false,
        ]);
        CRUD::field('special_situation')->type('textarea');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        // CRUD::addButtonFromModelFunction('line', 'varify_application', 'varifyApplication', 'beginning');
        CRUD::addButtonFromView('line', 'verify_application', 'verifyApp', 'beginning');
        // CRUD::modifyButton('Preview', 'view');
        // CRUD::column('full_name');
        // CRUD::column('nric');
        // CRUD::column('age')->type('number');
        // CRUD::column('experience');
    
        // CRUD::column('family_count');
        // CRUD::column('elders_and_kids_count');
        // CRUD::column('accomodation_situation');
        // CRUD::column('phyaically_form_submitted_date');
        // CRUD::column('moved_to_state_date');
        // CRUD::column('both_couple_are_staffs_in_same_city');
        // CRUD::column('special_situation');
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
}
