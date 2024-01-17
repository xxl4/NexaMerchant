@props(['isMultiRow' => false])

<v-datagrid-table>
    {{ $slot }}
</v-datagrid-table>

@pushOnce('scripts')
    <script type="text/x-template" id="v-datagrid-table-template">
        <div class="w-full">
<<<<<<< HEAD
            <div class="table-responsive grid w-full box-shadow rounded-[4px] bg-white dark:bg-gray-900 overflow-hidden">
=======
            <div class="table-responsive grid w-full box-shadow rounded bg-white dark:bg-gray-900 overflow-hidden">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <slot name="header">
                    <template v-if="$parent.isLoading">
                        <x-admin::shimmer.datagrid.table.head :isMultiRow="$isMultiRow"></x-admin::shimmer.datagrid.table.head>
                    </template>

                    <template v-else>
                        <div
<<<<<<< HEAD
                            class="row grid gap-[10px] min-h-[47px] px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold items-center"
                            :style="`grid-template-columns: repeat(${gridsCount}, 1fr)`"
=======
                            class="row grid gap-2.5 min-h-[47px] px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold items-center"
                            :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        >
                            <!-- Mass Actions -->
                            <p v-if="$parent.available.massActions.length">
                                <label for="mass_action_select_all_records">
                                    <input
                                        type="checkbox"
                                        name="mass_action_select_all_records"
                                        id="mass_action_select_all_records"
                                        class="peer hidden"
                                        :checked="['all', 'partial'].includes($parent.applied.massActions.meta.mode)"
                                        @change="$parent.selectAllRecords"
                                    >

                                    <span
<<<<<<< HEAD
                                        class="icon-uncheckbox cursor-pointer rounded-[6px] text-[24px]"
=======
                                        class="icon-uncheckbox cursor-pointer rounded-md text-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :class="[
                                            $parent.applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600 ' : (
                                                $parent.applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                            ),
                                        ]"
                                    >
                                    </span>
                                </label>
                            </p>

                            <!-- Columns -->
                            <p
                                v-for="column in $parent.available.columns"
<<<<<<< HEAD
                                class="flex gap-[5px] items-center"
=======
                                class="flex gap-1.5 items-center break-words"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="{'cursor-pointer select-none hover:text-gray-800 dark:hover:text-white': column.sortable}"
                                @click="$parent.sortPage(column)"
                            >
                                @{{ column.label }}

                                <i
<<<<<<< HEAD
                                    class="text-[16px] text-gray-600 dark:text-gray-300 align-text-bottom"
=======
                                    class="text-base  text-gray-600 dark:text-gray-300 align-text-bottom"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="[$parent.applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                    v-if="column.index == $parent.applied.sort.column"
                                ></i>
                            </p>

                            <!-- Actions -->
                            <p
<<<<<<< HEAD
                                class="col-start-[none]"
=======
                                class="place-self-end"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-if="$parent.available.actions.length"
                            >
                                @lang('admin::app.components.datagrid.table.actions')
                            </p>
                        </div>
                    </template>
                </slot>

                <slot name="body">
                    <template v-if="$parent.isLoading">
                        <x-admin::shimmer.datagrid.table.body :isMultiRow="$isMultiRow"></x-admin::shimmer.datagrid.table.body>
                    </template>

                    <template v-else>
                        <template v-if="$parent.available.records.length">
                            <div
<<<<<<< HEAD
                                class="row grid gap-[10px] items-center px-[16px] py-[16px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                                v-for="record in $parent.available.records"
                                :style="`grid-template-columns: repeat(${gridsCount}, 1fr)`"
=======
                                class="row grid gap-2.5 items-center px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                                v-for="record in $parent.available.records"
                                :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            >
                                <!-- Mass Actions -->
                                <p v-if="$parent.available.massActions.length">
                                    <label :for="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`">
                                        <input
                                            type="checkbox"
                                            class="peer hidden"
                                            :name="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`"
                                            :value="record[$parent.available.meta.primary_column]"
                                            :id="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`"
                                            v-model="$parent.applied.massActions.indices"
                                            @change="$parent.setCurrentSelectionMode"
                                        >

<<<<<<< HEAD
                                        <span class="icon-uncheckbox peer-checked:icon-checked peer-checked:text-blue-600 cursor-pointer rounded-[6px] text-[24px] peer-checked:text-blue-600">
=======
                                        <span class="icon-uncheckbox peer-checked:icon-checked peer-checked:text-blue-600 cursor-pointer rounded-md text-2xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        </span>
                                    </label>
                                </p>

                                <!-- Columns -->
                                <p
<<<<<<< HEAD
                                    v-if="record.is_closure"
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
=======
                                    class="break-words"
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
                                    v-if="record.is_closure"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </p>

                                <p
<<<<<<< HEAD
                                    v-else
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
=======
                                    class="break-words"
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
                                    v-else
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </p>

                                <!-- Actions -->
                                <p
<<<<<<< HEAD
                                    v-if="$parent.available.actions.length"
                                    class="col-start-[none]"
                                >
                                    <span
                                        class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
=======
                                    class="place-self-end"
                                    v-if="$parent.available.actions.length"
                                >
                                    <span
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :class="action.icon"
                                        v-text="!action.icon ? action.title : ''"
                                        v-for="action in record.actions"
                                        @click="$parent.performAction(action)"
                                    >
                                    </span>
                                </p>
                            </div>
                        </template>

                        <template v-else>
<<<<<<< HEAD
                            <div class="row grid px-[16px] py-[16px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 text-center">
=======
                            <div class="row grid px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 text-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p>
                                    @lang('admin::app.components.datagrid.table.no-records-available')
                                </p>
                            </div>
                        </template>
                    </template>
                </slot>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-datagrid-table', {
            template: '#v-datagrid-table-template',

            computed: {
                gridsCount() {
                    let count = this.$parent.available.columns.length;

                    if (this.$parent.available.actions.length) {
                        ++count;
                    }

                    if (this.$parent.available.massActions.length) {
                        ++count;
                    }

                    return count;
                },
            },
        });
    </script>
@endpushOnce
