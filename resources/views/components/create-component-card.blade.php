<div class="w-full max-w-4xl bg-white border border-silver rounded-lg p-6 justify-center ">

        <h2 class="text-2xl font-bold mb-4 text-center">Create Your Components</h2>


        <div x-data="formBuilder()" class="space-y-4">


            <!-- Add Component Buttons -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4   gap-4 justify-center items-center">
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
                                <input type="text" x-model="component.title" name="image_titles[]"
                                    class="block w-full p-2 border rounded-lg" placeholder="Enter image title here">

                                <!-- Image Upload -->
                                <label class="block text-sm font-medium text-gray-700">Upload Image</label>
                                <input type="file" :id="'filepond-' + component.id" name="image_contents[]"
                                    class="filepond">

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
                if (type === 'image') {
                    const component = { title: '', type: type, content: '', caption: '', id: Date.now() }; // Add a unique ID
                    this.components.push(component);
                    this.$nextTick(() => {
                        // Initialize FilePond only for the newly added input
                        this.initializeFilePond(component.id);
                    });
                    return;
                }
                this.components.push({ title: '', type: type, content: '' });
            },

            removeComponent(index) {
                const component = this.components[index];
                this.components.splice(index, 1);
                this.$nextTick(() => {
                    // Destroy only the specific FilePond instance of the removed component
                    const pondElement = document.querySelector(`#filepond-${component.id}`);
                    if (pondElement && pondElement.filepond) {
                        pondElement.filepond.destroy();
                    }
                });
            },

            initializeFilePond(id) {
                // Initialize FilePond only for the new input with the specific ID
                const pondElement = document.querySelector(`#filepond-${id}`);
                if (pondElement) {
                    FilePond.create(pondElement, {
                        credits: false, // Disable credits
                        server: {
                            process: '/upload', // Define your server route to process the upload
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }
                    });
                }
            }
        }
    }
</script>