<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf 
            
            <x-form.input name="title" id="Título"/>
            <x-form.input name="slug" id="Slug"/>
            <x-form.input name="thumbnail" type="file" id="Miniatura"/>
            <x-form.textarea name="excerpt" id="Excerto"/>
            <x-form.textarea name="body" rows="12" id="Corpo"/>
            
            <x-form.field>

                <x-form.label name="Categoria"/>

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option 
                            value="{{$category->id}}" 
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        > 
                            {{ ucwords($category->name) }} 
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category"/>

            </x-form.field>

            <x-form.button> Publicar </x-form.button> 

        </form>
    </x-setting>
 </x-layout>