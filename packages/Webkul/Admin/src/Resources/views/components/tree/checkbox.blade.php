@pushOnce('scripts')
<<<<<<< HEAD
    {{-- v-tree-checkbox template--}}
    <script type="text/x-template" id="v-tree-checkbox-template">
        <label
            :for="id"
            class="inline-flex gap-[10px] w-max p-[6px] items-center cursor-pointer select-none group"
        >
            <input
                type="checkbox"
                :name="[nameField + '[]']"
                :value="modelValue"
                :id="id"
                class="hidden peer"
                @change="inputChanged()"
                :checked="isActive"
            >

            <span class="icon-uncheckbox rounded-[6px] text-[24px] cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600 ">
            </span>

            <div
                class="text-[14px] text-gray-600 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-white"
=======
    <script type="text/x-template" id="v-tree-checkbox-template">
        <label
            :for="id"
            class="inline-flex gap-2.5 w-max p-1.5 items-center cursor-pointer select-none group"
        >
            <input
                type="checkbox"
                :name="[name + '[]']"
                :value="value"
                :id="id"
                class="hidden peer"
                :checked="isActive"
                @change="inputChanged()"
            >

            <span class="icon-uncheckbox rounded-md text-2xl cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600">
            </span>

            <div
                class="text-sm text-gray-600 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-white"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="label"
            >
            </div>
        </label>
    </script>

<<<<<<< HEAD
    {{-- v-tree-checkbox component --}}
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <script type="module">
        app.component('v-tree-checkbox', {
            template: '#v-tree-checkbox-template',

            name: 'v-tree-checkbox',

<<<<<<< HEAD
            props: ['id', 'label', 'nameField', 'modelValue', 'inputValue', 'value'],

            computed: {
                isMultiple () {
                    return Array.isArray(this.internalValue);
                },

                isActive () {
                    let value = this.value;
                    let input = this.internalValue;

                    if (this.isMultiple) {
                        return input.some(item => this.valueComparator(item, value));
                    }

                    return value ? this.valueComparator(value, input) : Boolean(input);
                },

                internalValue: {
                    get () {
                        return this.lazyValue;
                    },

                    set (val) {
                        this.lazyValue = val;
                    }
                }
            },

            data: vm => ({
                lazyValue: vm.inputValue,
            }),

            watch: {
                inputValue (val) {
                    this.internalValue = val;
                }
            },

            methods: {
                inputChanged () {
                    let value = this.value;
                    let input = this.internalValue;

                    if (this.isMultiple) {
                        let length = input.length;

                        input = input.filter(item => !this.valueComparator(item, value));

                        if (input.length === length) {
                            input.push(value);
                        }
                    } else {
                        input = !input;
                    }

                    this.$emit('input-change', input);
                },

                valueComparator (a, b) {
                    if (a === b) 
                        return true;

                    if (a !== Object(a) || b !== Object(b)) {
                        return false;
                    }

                    let props = Object.keys(a);

                    if (props.length !== Object.keys(b).length) {
                        return false;
                    }

                    return props.every(p => this.valueComparator(a[p], b[p]));
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
