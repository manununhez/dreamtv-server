<?php

namespace App\Admin\Controllers;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class VideoAdminController extends Controller
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
        $grid = new Grid(new Video);

        $grid->id('Id');
        $grid->video_id('Video id');
        $grid->primary_audio_language_code('Primary audio language code');
        $grid->original_language('Original language');
        $grid->title('Title');
        $grid->description('Description');
        $grid->duration('Duration');
        $grid->thumbnail('Thumbnail');
        $grid->team('Team');
        $grid->project('Project');
        $grid->video_url('Video url');
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
        $show = new Show(Video::findOrFail($id));

        $show->id('Id');
        $show->video_id('Video id');
        $show->primary_audio_language_code('Primary audio language code');
        $show->original_language('Original language');
        $show->title('Title');
        $show->description('Description');
        $show->duration('Duration');
        $show->thumbnail('Thumbnail');
        $show->team('Team');
        $show->project('Project');
        $show->video_url('Video url');
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
        $form = new Form(new Video);

        $form->text('video_id', 'Video id');
        $form->text('primary_audio_language_code', 'Primary audio language code');
        $form->text('original_language', 'Original language');
        $form->text('title', 'Title');
        $form->textarea('description', 'Description');
        $form->number('duration', 'Duration');
        $form->text('thumbnail', 'Thumbnail');
        $form->text('team', 'Team');
        $form->text('project', 'Project');
        $form->text('video_url', 'Video url');

        return $form;
    }
}
