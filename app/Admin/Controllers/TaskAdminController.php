<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TaskAdminController extends Controller
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
        $grid = new Grid(new Task);

        $grid->id('Id');
        $grid->task_id('Task id');
        $grid->video_id('Video id');
        $grid->language('Language');
        $grid->type('Type');
        $grid->priority('Priority');
       #$grid->created('Created');
       $grid->modified('Modified');
       $grid->completed('Completed');
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
        $show = new Show(Task::findOrFail($id));

        $show->id('Id');
        $show->task_id('Task id');
        $show->video_id('Video id');
        $show->language('Language');
        $show->type('Type');
        $show->priority('Priority');
        #$show->created('Created');
        $show->modified('Modified');
        $show->completed('Completed');
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
        $form = new Form(new Task);

        $form->number('task_id', 'Task id');
        $form->text('video_id', 'Video id');
        $form->text('language', 'Language');
        $form->text('type', 'Type');
        $form->number('priority', 'Priority');
        $form->text('created', 'Created');
        $form->text('modified', 'Modified');
        $form->text('completed', 'Completed');

        return $form;
    }
}
