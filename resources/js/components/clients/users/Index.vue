<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/users/create" class="btn btn-danger pull-right"> Create user </a>
                    </div>
                    <div class="card-body p-0">
                        <vue-good-table
                          :columns="columns"
                          :rows="rows"
                          :line-numbers="true"
                          :search-options="{
                            enabled: true
                          }"
                          :sort-options="{
                            enabled: true,
                            initialSortBy: {field: 'updated_at', type: 'desc'}
                          }"
                          :pagination-options="{
                            enabled: true,
                            mode: 'records',
                            perPage: 10,
                            perPageDropdown: [10, 20, 50],
                            dropdownAllowAll: false,
                            nextLabel: 'next',
                            prevLabel: 'prev',
                            rowsPerPageLabel: 'Rows per page',
                            ofLabel: 'of',
                            pageLabel: 'page', // for 'pages' mode
                            allLabel: 'All',
                          }">
                            <template slot="table-row" slot-scope="props">
                                <a v-if="props.column.field == 'show'" class="btn btn-link" :href="'/users/' + props.formattedRow['id']"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a v-else-if="props.column.field == 'edit'" class="btn btn-link" :href="'/users/' + props.formattedRow['id'] + '/edit'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <span v-else-if="props.column.field == 'is_admin'" ></span>
                                <span v-else>
                                  {{props.formattedRow[props.column.field]}}
                                </span>
                            </template>
                        </vue-good-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['prop_users'],
        data () {
            return {
                columns: [
                    {
                      label: 'Id',
                      field: 'id',
                      type: 'number',
                      filterable: true,
                      hidden: true
                    },
                    {
                      label: 'Username',
                      field: 'name',
                      filterable: true,
                    },
                    {
                      label: 'Email',
                      field: 'email',
                      filterable: true,
                    },
                    {
                      label: 'is_admin',
                      field: 'url',
                      filterable: true,
                    },
                    {
                      label: 'Created At',
                      field: 'created_at',
                      type: 'datetime',
                    },
                    {
                      label: 'Updated At',
                      field: 'updated_at',
                      type: 'datetime',
                    },
                    {
                        label: '',
                        field: 'show',
                        html:true,
                    },
                    {
                        label: '',
                        field: 'edit',
                        html:true,
                    },
                  ],
                  rows: [],
            }
        },
        created() {
            this.setDefault();
        },
        methods: {
            setDefault() {
                this.rows = this.prop_users;
            }
        }
    }
</script>
