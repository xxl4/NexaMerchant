<v-flash-item
    v-for='flash in flashes'
    :key='flash.uid'
    :flash="flash"
    @onRemove="remove($event)"
></v-flash-item>

@pushOnce('scripts')
    <script type="text/x-template" id="v-flash-item-template">
        <div
<<<<<<< HEAD
            class="flex gap-[46px] justify-between w-max max-w-[408px] px-[20px] py-[12px] rounded-[8px]"
            :style="typeStyles[flash.type]['container']"
        >
            <p
                class="text-[14px] flex break-all"
                :style="typeStyles[flash.type]['message']"
            >
                <span
                    class="icon-toast-done mr-[10px] text-[24px]"
=======
            class="flex gap-12 justify-between w-max max-w-[408px] px-5 py-3 rounded-lg"
            :style="typeStyles[flash.type]['container']"
        >
            <p
                class="flex text-sm break-all"
                :style="typeStyles[flash.type]['message']"
            >
                <span
                    class="icon-toast-done ltr:mr-2.5 rtl:ml-2.5 text-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :class="iconClasses[flash.type]"
                    :style="typeStyles[flash.type]['icon']"
                ></span>

                @{{ flash.message }}
            </p>

			<span
<<<<<<< HEAD
                class="icon-cancel max-h-[16px] max-w-[16px] cursor-pointer"
=======
                class="icon-cancel max-h-4 max-w-4 cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                :style="typeStyles[flash.type]['icon']"
                @click="remove"
            ></span>
        </div>
    </script>

    <script type="module">
        app.component('v-flash-item', {
            template: '#v-flash-item-template',

            props: ['flash'],

            data() {
                return {
                    iconClasses: {
                        success: 'icon-toast-done',

                        error: 'icon-toast-error',

                        warning: 'icon-toast-exclamation-mark',

                        info: 'icon-toast-info',
                    },

                    typeStyles: {
                        success: {
                            container: 'background: #D4EDDA',

                            message: 'color: #155721',

                            icon: 'color: #155721'
                        },

                        error: {
                            container: 'background: #F8D7DA',

                            message: 'color: #721C24',

                            icon: 'color: #721C24'
                        },

                        warning: {
                            container: 'background: #FFF3CD',

                            message: 'color: #856404',

                            icon: 'color: #856404'
                        },

                        info: {
                            container: 'background: #E2E3E5',

                            message: 'color: #383D41',

                            icon: 'color: #383D41'
                        },
                    },
                };
            },

            created() {
                var self = this;

                setTimeout(function() {
                    self.remove()
                }, 5000)
            },

            methods: {
                remove() {
                    this.$emit('onRemove', this.flash)
                }
            }
        });
    </script>
@endpushOnce
