<div x-data="{ open: false }" @click='open = true'
    class="flex flex-col h-48 items-center bg-white cursor-pointer border-dashed border-2 shadow-sm rounded-xl justify-center">
    <div class="p-4 md:p-7">
        <x-sub-heading class="text-gray-700">
            + add new project
        </x-sub-heading>
    </div>

    <div x-show='open' class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex flex-col min-h-full justify-center p-4 text-center items-center ">

                <div @click.away="open = false" @keydown.escape.window="open = false"
                    class="flex flex-col relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all ">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex flex-col items-center ">

                            <p class="mt-2 text-gray-500 ">
                                Start a new project.
                            </p>
                            <form action="/dashboard/projects" method="POST" class="flex flex-col">
                                @csrf
                                <div class="mt-4">
                                    <x-form-input type="text" id="name" name="name" placeholder="Project name"
                                        required />
                                </div>
                                <div class="mt-4">
                                    <x-form-input type="text" name="link" id="link" 
                                        placeholder="Project link"  />
                                </div>
                                <div class="mt-4">
                                    <x-form-input type="text" name="description" id="description" 
                                        placeholder="Project description" required />
                                </div>
                                <div class="mt-4 w-full">
                                    <x-form-button-primary>Create project</x-form-button-primary>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>