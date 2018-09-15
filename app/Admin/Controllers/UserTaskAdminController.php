<?php

namespace App\Admin\Controllers;

use App\Models\UserTask;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserTaskAdminController extends Controller
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
        $grid = new Grid(new UserTask);

        $grid->id('Id');
        $grid->user_id('User id');
        $grid->task_id('Task id');
        $grid->subtitle_version('Subtitle version');
        $grid->subtitle_position('Subtitle position');
        $grid->reason_id('Reason id');
        $grid->comments('Comments');
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
        $show = new Show(UserTask::findOrFail($id));

        $show->id('Id');
        $show->user_id('User id');
        $show->task_id('Task id');
        $show->subtitle_version('Subtitle version');
        $show->subtitle_position('Subtitle position');
        $show->reason_id('Reason id');
        $show->comments('Comments');
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
        $form = new Form(new UserTask);

        $form->number('user_id', 'User id');
        $form->number('task_id', 'Task id');
        $form->text('subtitle_version', 'Subtitle version');
        $form->number('subtitle_position', 'Subtitle position');
        $form->text('reason_id', 'Reason id');
        $form->textarea('comments', 'Comments');

        return $form;
    }
}
