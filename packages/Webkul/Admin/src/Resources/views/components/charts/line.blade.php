<v-charts-line {{ $attributes }}></v-charts-line>

@pushOnce('scripts')
<<<<<<< HEAD
    {{-- SEO Vue Component Template --}}
    <script type="text/x-template" id="v-charts-line-template">
        <canvas
            :id="$.uid + '_chart'"
            class="flex items-end w-full aspect-[3.23/1]"
=======
    <!-- SEO Vue Component Template -->
    <script type="text/x-template" id="v-charts-line-template">
        <canvas
            :id="$.uid + '_chart'"
            class="flex items-end w-full"
            :style="'aspect-ratio:' + aspectRatio + '/1'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-line', {
            template: '#v-charts-line-template',

<<<<<<< HEAD
            props: ['labels', 'datasets'],
=======
            props: {
                labels: {
                    type: Array, 
                    default: [],
                },

                datasets: {
                    type: Array, 
                    default: true,
                },

                aspectRatio: {
                    type: Number, 
                    default: 3.23,
                },
            },
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            data() {
                return {
                    chart: undefined,
                }
            },

            mounted() {
                this.prepare();
            },

            methods: {
                prepare() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'line',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },
                
                        options: {
<<<<<<< HEAD
                            aspectRatio: 3.17,
=======
                            aspectRatio: this.aspectRatio,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            
                            plugins: {
                                legend: {
                                    display: false
                                },

                                {{-- tooltip: {
                                    enabled: false,
                                } --}}
                            },
                            
                            scales: {
                                x: {
                                    beginAtZero: true,

                                    border: {
                                        dash: [8, 4],
                                    }
                                },

                                y: {
                                    beginAtZero: true,
                                    border: {
                                        dash: [8, 4],
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endPushOnce