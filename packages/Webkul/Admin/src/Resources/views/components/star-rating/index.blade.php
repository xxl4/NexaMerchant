@props([
    'name'     => 'rating',
    'value'    => 0,
    'disabled' => true,
])

<v-star-rating
    {{ $attributes }}
    name="{{ $name }}"
    value="{{ $value }}"
    disabled="{{ $disabled }}"
>
</v-star-rating>

@pushOnce("scripts")
    <script type="text/x-template" id="v-star-rating-template">
        <div class="flex">
            <span
<<<<<<< HEAD
                class="icon-star-fill text-[24px] cursor-pointer"
=======
                class="icon-star-fill text-2xl cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-for="rating in availableRatings"
                v-if="! disabled"
                :style="[`color: ${appliedRatings >= rating ? '#ffb600' : '#7d7d7d'}`]"
                @click="change(rating)"
            ></span>

            <span
<<<<<<< HEAD
                class="icon-star text-[18px]"
=======
                class="icon-star text-lg"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-for="rating in availableRatings"
                :style="[`color: ${appliedRatings >= rating ? '#ffb600' : '#7d7d7d'}`]"
                v-else
            ></span>

            <v-field
                type="hidden"
                :name="name"
                v-model="appliedRatings"
            ></v-field>
        </div>
    </script>

    <script type="module">
        app.component("v-star-rating", {
            template: "#v-star-rating-template",

            props: [
                "name",
                "value",
                "disabled",
            ],

            data() {
                return {
                    availableRatings: [1, 2, 3, 4, 5],

                    appliedRatings: this.value,
                };
            },

            methods: {
                change(rating) {
                    this.appliedRatings = rating;

                    this.$emit('change', this.appliedRatings);
                },
            },
        });
    </script>
@endPushOnce
