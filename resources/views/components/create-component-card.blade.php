<div class="flex justify-center font-display tracking-tight flex-col space-y-8 items-center px-8 py-4 ">
    <div class="w-full max-w-4xl bg-white border border-silver rounded-lg p-6 justify-center">

        <h2 class="text-2xl font-bold mb-4 text-center">Create Your Components</h2>


        <div x-data="formBuilder()" class="space-y-4">

            <div class="flex space-x-4 justify-center">
                <button @click="addComponent('text')"
                    class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black">+
                    Add Text
                    Field</button>
                <button @click="addComponent('textarea')"
                    class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black">+
                    Add Text
                    Area</button>
                <button @click="addComponent('image')"
                    class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black">+
                    Add
                    Image</button>
                <button @click="addComponent('date')"
                    class="items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center p-4 text-gray-700 border-black">+
                    Add
                    Date</button>
            </div>

            <!-- Form Preview Area -->
            <form method="POST" action="/projects/{{$project->id}}/pages/{{$page->id}}/components" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <template x-for="(component, index) in components" :key="index">
                    <div class="space-y-2 border rounded-lg p-4 ">
                        <!-- Render Different Component Types -->
                        <template x-if="component.type == 'text'">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Text Field</label>
                                <input type="text" name="text_components[]" class="block w-full p-2 border rounded-lg"
                                    placeholder="Enter text here">
                            </div>
                        </template>

                        <template x-if="component.type == 'textarea'">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Text Area</label>
                                <textarea name="textarea_components[]" class="block w-full p-2 border rounded-lg"
                                    placeholder="Enter text here"></textarea>
                            </div>
                        </template>

                        <template x-if="component.type == 'image'">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Image</label>
                                <input type="file" name="image_components[]" class="block w-full p-2 border rounded-lg">
                            </div>
                        </template>

                        <template x-if="component.type == 'date'">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Select Date</label>
                                <input type="date" name="date_components[]" class="block w-full p-2 border rounded-lg">
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
</div>



<script>
    function formBuilder() {
        return {
            components: [],

            addComponent(type) {
                this.components.push({ type: type });
            },

            removeComponent(index) {
                this.components.splice(index, 1);
            },
        }
    }
</script>