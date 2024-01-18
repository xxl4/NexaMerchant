@props([
    'name'  => '',
    'value' => 1,
])

<v-quantity-changer
    {{ $attributes->merge(['class' => 'flex border border-navyBlue items-center']) }}
    name="{{ $name }}"
    value="{{ $value }}"
>
</v-quantity-changer>

@pushOnce('scripts')
    <script type="text/x-template" id="v-quantity-changer-template">
        <div>
            <span 
<<<<<<< HEAD
                class="icon-minus text-[24px] cursor-pointer" 
=======
                class="icon-minus text-2xl cursor-pointer"
                role="button"
                tabindex="0"
                aria-label="@lang('shop::app.components.quantity-changer.decrease-quantity')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @click="decrease"
            >
            </span>

            <p
<<<<<<< HEAD
                class="w-[10px] text-center select-none"
=======
                class="w-2.5 text-center select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="quantity"
            ></p>
            
            <span 
<<<<<<< HEAD
                class="icon-plus text-[24px] cursor-pointer"
=======
                class="icon-plus text-2xl cursor-pointer"
                role="button"
                tabindex="0"
                aria-label="@lang('shop::app.components.quantity-changer.increase-quantity')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @click="increase"
            >
            </span>

            <v-field
                type="hidden"
                :name="name"
                v-model="quantity"
            ></v-field>
        </div>
    </script>

    <script type="module">
        app.component("v-quantity-changer", {
            template: '#v-quantity-changer-template',

            props:['name', 'value'],

            data() {
                return  {
                    quantity: this.value,
                }
            },

            watch: {
                value() {
                    this.quantity = this.value;
                },
            },

            methods: {
                increase() {
                    this.$emit('change', ++this.quantity);
                },

                decrease() {
                    if (this.quantity > 1) {
                        this.quantity -= 1;
                    }

                    this.$emit('change', this.quantity);
                },
            }
        });
    </script>
@endpushOnce
