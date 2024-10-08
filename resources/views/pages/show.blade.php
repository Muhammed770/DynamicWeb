@extends('layout.dashboard')

@section('pages-content')
<div class="flex justify-center flex-col bg-red-400 space-y-8 items-center px-8 py-4" x-data="componentGenerator()">

    <!-- Button to add a new component -->
    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg" @click="addComponent()">Add Component</button>

    <!-- Dynamic component list -->
    <div class="w-full space-y-4" id="components-list">

        <!-- Loop through components dynamically -->
        <template x-for="(component, index) in components" :key="index">
            <div class="bg-white p-4 rounded-lg shadow-lg space-y-4">

                <!-- Text Field Component -->
                <template x-if="component.type === 'text'">
                    <div class="space-y-2">
                        <label class="block font-bold">Text Field</label>
                        <input type="text" class="w-full p-2 border rounded" x-model="component.data.text"
                            placeholder="Enter your text here" />
                    </div>
                </template>

                <!-- Image Upload Component -->
                <template x-if="component.type === 'image'">
                    <div class="space-y-2">
                        <label class="block font-bold">Image Upload</label>
                        <input type="file" class="w-full p-2 border rounded" @change="uploadImage($event, index)" />
                        <input type="text" class="w-full p-2 border rounded" x-model="component.data.caption"
                            placeholder="Image Caption" />
                        <textarea class="w-full p-2 border rounded" x-model="component.data.description"
                            placeholder="Image Description"></textarea>
                    </div>
                </template>

                <!-- Date Component -->
                <template x-if="component.type === 'date'">
                    <div class="space-y-2">
                        <label class="block font-bold">Date</label>
                        <input type="date" class="w-full p-2 border rounded" x-model="component.data.date" />
                    </div>
                </template>

                <!-- Remove button for each component -->
                <button class="bg-red-500 text-white px-4 py-2 rounded" @click="removeComponent(index)">Remove</button>

            </div>
        </template>

    </div>

</div>

<script>
    function componentGenerator() {
        return {
            components: [],

            // Method to add a new component
            addComponent() {
                let componentType = prompt('Enter component type: text, image, or date');
                if (componentType === 'text') {
                    this.components.push({
                        type: 'text',
                        data: { text: '' }
                    });
                } else if (componentType === 'image') {
                    this.components.push({
                        type: 'image',
                        data: { caption: '', description: '', imageFile: null }
                    });
                } else if (componentType === 'date') {
                    this.components.push({
                        type: 'date',
                        data: { date: '' }
                    });
                } else {
                    alert('Invalid component type!');
                }
            },

            // Method to remove a component
            removeComponent(index) {
                this.components.splice(index, 1);
            },

            // Handle image upload
            uploadImage(event, index) {
                let file = event.target.files[0];
                this.components[index].data.imageFile = file;
            }
        };
    }
</script>

@endsection