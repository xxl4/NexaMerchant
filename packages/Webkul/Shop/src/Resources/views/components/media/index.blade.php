<v-media {{ $attributes }} >
    <x-shop::media.images.lazy
<<<<<<< HEAD
        class="w-[284px] h-[284px] mt-[30px] rounded-[12px]"
=======
        class="w-[284px] h-[284px] mb-4 rounded-xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ></x-shop::media.images.lazy>
</v-media>

@pushOnce('scripts')
    <script type="text/x-template" id="v-media-template">
        <div class="flex flex-col mb-4 rounded-lg cursor-pointer">
<<<<<<< HEAD
            <div :class="{'border border-dashed border-gray-300 dark:border-gray-800 rounded-[18px]': isDragOver }">
                <div
                    class="flex flex-col items-center justify-center w-[284px] h-[284px] bg-[#F5F5F5] rounded-[12px] cursor-pointer hover:bg-gray-100 dark:hover:gray-950"
=======
            <div :class="{'border border-dashed border-gray-300 dark:border-gray-800 rounded-2xl': isDragOver }">
                <div
                    class="flex flex-col items-center justify-center w-[284px] h-[284px] bg-[#F5F5F5] rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:gray-950"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-if="uploadedFiles.isPicked"
                >
                    <div 
                        class="group flex justify-center relative w-[284px] h-[284px]"
                        @mouseenter="uploadedFiles.showDeleteButton = true"
                        @mouseleave="uploadedFiles.showDeleteButton = false"
                    >
                        <img
<<<<<<< HEAD
                            class="rounded-[12px] object-cover"
=======
                            class="rounded-xl object-cover"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            :src="uploadedFiles.url"
                            :class="{'opacity-25' : uploadedFiles.showDeleteButton}"
                            alt="Uploaded Image"
                        >

                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <span 
<<<<<<< HEAD
                                class="icon-bin text-[24px] text-black cursor-pointer"
=======
                                class="icon-bin text-2xl text-black cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @click="removeFile"
                            >
                            </span>
                        </div>
                    </div>
                </div>

                <label 
                    for="file-input"
<<<<<<< HEAD
                    class="flex flex-col items-center justify-center w-[284px] h-[284px] bg-[#F5F5F5] rounded-[12px] hover:bg-gray-100 cursor-pointer"
=======
                    class="flex flex-col items-center justify-center w-[284px] h-[284px] bg-[#F5F5F5] rounded-xl hover:bg-gray-100 cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-show="! uploadedFiles.isPicked"
                    @dragover="onDragOver"
                    @dragleave="onDragLeave"
                    @drop="onDrop"
                >
                    <label 
                        for="file-input"
<<<<<<< HEAD
                        class="primary-button block w-max m-0 mx-auto py-[11px] px-[43px] rounded-[18px] text-base text-center"
=======
                        class="primary-button block w-max m-0 mx-auto py-3 px-11 rounded-2xl text-base text-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    >
                        @lang('shop::app.components.media.add-attachments')
                    </label>

                    <input type="hidden" :name="name" v-if="! uploadedFiles.isPicked"/>

                    <v-field
                        type="file"
                        :name="name"
                        id="file-input"
                        class="hidden"
                        :accept="acceptedTypes"
                        :rules="appliedRules"
                        :multiple="isMultiple"
                        @change="onFileChange"
                    >
                    </v-field>
                </label>
            </div>

            <div 
                class="flex items-center"
                v-if="isMultiple"
            >
<<<<<<< HEAD
                <ul class="flex gap-[10px] flex-wrap justify-left mt-2">
=======
                <ul class="flex gap-2.5 flex-wrap justify-left mt-2">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <li 
                        v-for="(file, index) in uploadedFiles"
                        :key="index"
                    >
                        <template v-if="isImage(file)">
                            <div 
                                class="relative group flex justify-center h-12 w-12"
                                @mouseenter="file.showDeleteButton = true"
                                @mouseleave="file.showDeleteButton = false"
                            >
                                <img
                                    :src="file.url"
                                    :alt="file.name"
<<<<<<< HEAD
                                    class="rounded-[12px] min-w-[48px] max-h-[48px]"
=======
                                    class="rounded-xl min-w-12 max-h-12"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="{'opacity-25' : file.showDeleteButton}"
                                >

                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span 
<<<<<<< HEAD
                                        class="icon-bin text-[24px] text-black cursor-pointer"
=======
                                        class="icon-bin text-2xl text-black cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @click="removeFile(index)"
                                    >
                                    </span>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div
                                class="relative group flex justify-center h-12 w-12"
                                @mouseenter="file.showDeleteButton = true"
                                @mouseleave="file.showDeleteButton = false"
                            >
                                <video
                                    :src="file.url"
                                    :alt="file.name"
<<<<<<< HEAD
                                    class="min-w-[50px] max-h-[50px] rounded-[12px]"
=======
                                    class="min-w-[50px] max-h-[50px] rounded-xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="{'opacity-25' : file.showDeleteButton}"
                                >
                                </video>

                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span 
<<<<<<< HEAD
                                        class="icon-bin text-[24px] text-black cursor-pointer"
=======
                                        class="icon-bin text-2xl text-black cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @click="removeFile(index)"
                                    >
                                    </span>
                                </div>
                            </div>
                        </template>
                    </li>
                </ul>
            </div>
        </div>
    </script>

    <script type="module">
        app.component("v-media", {
            template: '#v-media-template',

            props: {
                name: {
                    type: String, 
                    default: 'attachments',
                }, 

                isMultiple: {
                    type: Boolean,
                    default: false,
                }, 

                rules: {
                    type: String,
                },

                acceptedTypes: {
                    type: String, 
                    default: 'image/*, video/*,'
                }, 

                label: {
                    type: String, 
                    default: 'Add attachments'
                }, 

                src: {
                    type: String,
                    default: ''
                }
            },

            data() {
                return {
                    uploadedFiles: [],

                    isDragOver: false,

                    appliedRules: '',
                };
            },

            created() {
                this.appliedRules = this.rules;

                if (this.src != '') {
                    this.appliedRules = '';

                    this.uploadedFiles = {
                        isPicked: true,
                        url: this.src,
                    }                        
                }
            },

            methods: {
                onFileChange(event) {
                    let files = event.target.files;

                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];

                        let reader = new FileReader();

                        reader.onload = () => {
                            if (! this.isMultiple) {
                                this.uploadedFiles = {
                                    isPicked: true,
                                    name: file.name,
                                    url: reader.result,
                                }

                                return;
                            }

                            this.uploadedFiles.push({
                                name: file.name,
                                url: reader.result,
<<<<<<< HEAD
=======
                                file: new File([file], file.name),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            });
                        };

                        reader.readAsDataURL(file);
                    }
                },

                handleDroppedFiles(files) {
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];

                        let reader = new FileReader();
                        
                        reader.onload = () => {
                            if (! this.isMultiple) {
                                this.uploadedFiles = {
                                    isPicked: true,
                                    name: file.name,
                                    url: reader.result,
                                }

                                return;
                            }

                            this.uploadedFiles.push({
                                name: file.name,
                                url: reader.result,
                            });
                        };

                        reader.readAsDataURL(file);
                    }
                },

                isImage(file) {
                    if (! file.name) {
                        return;
                    }

                    return file.name.match(/\.(jpg|jpeg|png|gif)$/i);
                },

                onDragOver(event) {
                    event.preventDefault();

                    this.isDragOver = true;
                },

                onDragLeave(event) {
                    event.preventDefault();

                    this.isDragOver = false;
                },
                
                onDrop(event) {
                    event.preventDefault();

                    this.isDragOver = false;

                    let files = event.dataTransfer.files;

                    this.handleDroppedFiles(files);
                },

                removeFile(index) {
                    if (! this.isMultiple) {
                        this.uploadedFiles = [];

                        this.appliedRules = this.rules;
                        
                        return;
                    }

                    this.uploadedFiles.splice(index, 1);
                },
            },        
        });
    </script>
@endpushOnce
