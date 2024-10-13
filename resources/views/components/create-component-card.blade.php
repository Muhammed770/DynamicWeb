<div class="w-full max-w-4xl bg-white border border-silver rounded-lg p-6 justify-center">

    <h2 class="text-2xl font-bold mb-4 text-center">Create Your Components</h2>


    <div x-data="formBuilder()" class="space-y-4">

        <div class="grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-4 gap-4 justify-center">
            <button @click="addComponent('text')"
                class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black hover:bg-gray-100    ">+
                Add Text
                Field</button>
            <button @click="addComponent('textarea')"
                class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black hover:bg-gray-100">+
                Add Text
                Area</button>
            <button @click="addComponent('image')"
                class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black hover:bg-gray-100">+
                Add
                Image</button>
            <button @click="addComponent('date')"
                class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black hover:bg-gray-100">+
                Add
                Date</button>
        </div>

        <!-- Form Preview Area -->
        <form method="POST" action="/projects/{{$project->id}}/pages/{{$page->id}}/components"
            enctype="multipart/form-data" class="space-y-6">
            @csrf

            <template x-for="(component, index) in components" :key="index">
                <div class="space-y-2 border rounded-lg p-4 ">
                    <!-- Render Different Component Types -->
                    <template x-if="component.type == 'text'">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" x-model="component.title" name='text_titles[]'
                                class="block w-full p-2 border rounded-lg" placeholder="Enter title here">

                            <label class="block text-sm font-medium text-gray-700">Text Field</label>
                            <input type="text" x-model="component.content" name="text_contents[]"
                                class="block w-full p-2 border rounded-lg" placeholder="Enter text here">
                        </div>
                    </template>

                    <template x-if="component.type == 'textarea'">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" x-model="component.title" name='textarea_titles[]'
                                class="block w-full p-2 border rounded-lg" placeholder="Enter title here">

                            <label class="block text-sm font-medium text-gray-700">Text Area</label>
                            <textarea name="textarea_contents[]" class="block w-full p-2 border rounded-lg"
                                placeholder="Enter text here"></textarea>
                        </div>
                    </template>

                    <template x-if="component.type == 'image'">
                        <div>
                            <!-- Title -->
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" x-model="component.name" name="image_titles[]"
                                class="block w-full p-2 border rounded-lg" placeholder="Enter image title here">

                            <!-- Image Upload -->
                            <label class="block text-sm font-medium text-gray-700">Upload Image</label>
                            <input type="file"  name="image_contents[]" credits="false"
                                class="filepond">

                            <!-- Load FilePond library -->
                            <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

                            <!-- Turn all file input elements into ponds -->
                            <script>
                                FilePond.parse(document.body);
                                FilePond.setOptions({
                                    server: {
                                        url: '/upload',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    }
                                    
                                })
                            </script>

                            <!-- Caption -->
                            <label class="block text-sm font-medium text-gray-700">Caption</label>
                            <input type="text" x-model="component.caption" name="image_captions[]"
                                class="block w-full p-2 border rounded-lg" placeholder="Enter image caption here">

                        </div>
                    </template>

                    <template x-if="component.type == 'date'">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" x-model="component.title" name='date_titles[]'
                                class="block w-full p-2 border rounded-lg" placeholder="Enter title here">
                            <label class="block text-sm font-medium text-gray-700">Select Date</label>
                            <input type="date" x-model="component.content" name="date_contents[]"
                                class="block w-full p-2 border rounded-lg">
                        </div>
                    </template>

                    <button @click="removeComponent(index)" type="button" class="text-red-500">Remove</button>
                </div>
            </template>

            <!-- Submit Form Button -->
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-onyx text-white px-4 py-2 rounded">Save components</button>
            </div>
        </form>
    </div>

</div>




<script>
    function formBuilder() {
        return {
            components: [],

            addComponent(type) {
                if(type === 'image') {
                    this.components.push({title:'',type: type ,content:'',caption:''});
                    return;
                }
                this.components.push({title:'', type: type, content:'' });
            },

            removeComponent(index) {
                this.components.splice(index, 1);
            },
        }
    }
</script>