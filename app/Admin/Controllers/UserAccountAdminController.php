<?php

namespace App\Admin\Controllers;

use App\Models\UserAccount;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserAccountAdminController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAccount);

        $grid->id('Id');
        $grid->name('Name');
        $grid->type('Type');
        $grid->token('Token');
        $grid->interface_mode('Interface mode');
        $grid->interface_language('Interface language');
        $grid->sub_language('Sub language');
        $grid->audio_language('Audio language');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(UserAccount::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->type('Type');
        $show->token('Token');
        $show->interface_mode('Interface mode');
        $show->interface_language('Interface language');
        $show->sub_language('Sub language');
        $show->audio_language('Audio language');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserAccount);

        $form->text('name', 'Name');
        $form->text('type', 'Type');
        $form->text('token', 'Token');
        $form->text('interface_mode', 'Interface mode');
        $form->text('interface_language', 'Interface language');
        $form->text('sub_language', 'Sub language');
        $form->text('audio_language', 'Audio language');

        return $form;
    }
}
