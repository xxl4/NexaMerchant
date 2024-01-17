@pushOnce('scripts')
<<<<<<< HEAD
    {{-- v-tree-radio-component template --}}
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <script
        type="text/x-template"
        id="v-tree-radio-template"
    >
        <label
            :for="id"
<<<<<<< HEAD
            class="inline-flex items-center w-max p-[6px] text-gray-600 dark:text-gray-300 cursor-pointer select-none"
        >
            <input
                type="radio"
                :name="nameField"
                :value="modelValue"
                :id="id"
                class="hidden peer"
                :checked="isActive"
            >

            <span class="icon-radio-normal mr-[4px] text-[24px] rounded-[6px] cursor-pointer peer-checked:icon-radio-selected peer-checked:text-blue-600"></span>

            <div 
                class="text-[14px] text-gray-600 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-white"
=======
            class="inline-flex items-center w-max p-1.5 text-gray-600 dark:text-gray-300 cursor-pointer select-none"
        >
            <input
                type="radio"
                :name="name"
                :value="value"
                :id="id"
                class="hidden peer"
                :checked="isActive"
                @change="inputChanged()"
            >

            <span class="icon-radio-normal mr-1 text-2xl rounded-md cursor-pointer peer-checked:icon-radio-selected peer-checked:text-blue-600"></span>

            <div
                class="text-sm text-gray-600 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-white"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="label"
            >
            </div>
        </label>
    </script>

<<<<<<< HEAD
    {{-- v-tree-radio component --}}
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <script type="module">
        app.component('v-tree-radio', {
            template: '#v-tree-radio-template',

            name: 'v-tree-radio',

<<<<<<< HEAD
            props: ['id', 'label', 'nameField', 'modelValue', 'value'],

            computed: {
                isActive() {
                    if(this.value.length) {
                        return this.value[0] == this.modelValue ? true : false;
                    }

                    return false
                }
            }
        });
    </script>
@endPushOnce
=======
            props: ['id', 'label', 'name', 'value'],

            computed: {
                isActive() {
                    return this.$parent.has(this.value);
                },
            },

            methods: {
                inputChanged() {
                    this.$emit('change-input', {
                        id: this.id,
                        label: this.label,
                        name: this.name,
                        value: this.value,
                    });
                },
            },
        });
    </script>
@endPushOnce
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
