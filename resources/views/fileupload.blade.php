https://github.com/pqina/filepond
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
 <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
 https://github.com/alpinejs/alpine
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
<div class="order-2">
    <div>
        <button class="bg-gray-200 px-6 h-12 rounded-lg mr-2 font-bold" wire:click="$set('creatingNewFolder', true)">
            New Folder
        </button>

        <button class="bg-blue-500 text-white px-6 h-12 rounded-lg font-bold" wire:click="$set('showingFileUploadForm', true)">
            Upload Files
        </button>
    </div>
</div>

<!-- livewire blade -->
    <x-jet-modal wire:model="showingFileUploadForm">
        <div wire:ignore class="m-3 border-dashed border-2" x-data="{
            initFilepond() {
                const pond = FilePond.create(this.$refs.filepond, {
                    onprocessfile: (error, file) => {
                        pond.removeFile(file.id)

                        if (pond.getFiles().length === 0) {
                            @this.set('showingFileUploadForm', false)
                        }
                    },
                    allowRevert: false,
                    server: {
                        process: (fieldName, file, metdata, load, error, progress, abort, transfer, options) => {
                            @this.upload('upload', file, load, error, progress)
                        }
                    }
                })
            }
        }" x-init="initFilepond">
            <div>
                <input type="file" class="" x-ref="filepond" multiple>
            </div>
        </div>
    </x-jet-modal>

    <!-- livewire php -->
     public function updatedUpload($upload) {
        $object = $this->currentTeam->objects()->make([//current team user return kore
            'parent_id' => $this->object->id
            ]);

        $object->objectable()->associate($this->currentTeam->files()->create([
            'name' => $upload->getClientOriginalName(),
            'size' => $upload->getSize(),
            'path' => $upload->storePublicly( //path file uploard table er ekta attribute
                'files', [
                    'disk' => 'local'
                    ])
        ]));

        $object->save();

        $this->object = $this->object->fresh();//fresh ekta pre built method
    }