<div class="form-body">

    <div class="form-group">
        <label class="control-label col-md-2">Título</label>
        <div class="col-md-10">
            <input type="text" name="title" value="{{ isset( $page->title ) ? $page->title : '' }}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2">Slug</label>
        <div class="col-md-10">
            <input type="text" name="slug" value="{{ isset( $page->slug ) ? $page->slug : '' }}"  class="form-control" {{ isset( $page->default )  && $page->default === '1' ? 'disabled' : '' }}>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2">Conteúdo</label>
        <div class="col-md-10">
            <textarea class="wysihtml5 form-control" name="body" rows="10">{{ isset( $page->body ) ? $page->body : '' }}</textarea>
        </div>
    </div>

</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
