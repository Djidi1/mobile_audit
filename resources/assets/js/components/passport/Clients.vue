<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3>
                        OAuth Clients
                    </h3>

                    <a class="waves-effect waves-light btn" @click="showCreateClientForm">
                        Create New Client
                    </a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Current Clients -->
                <p class="m-b-none" v-if="clients.length === 0">
                    You have not created any OAuth clients.
                </p>

                <table class="table table-borderless m-b-none" v-if="clients.length > 0">
                    <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Name</th>
                        <th>Secret</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="client in clients">
                        <!-- ID -->
                        <td style="vertical-align: middle;">
                            {{ client.id }}
                        </td>

                        <!-- Name -->
                        <td style="vertical-align: middle;">
                            {{ client.name }}
                        </td>

                        <!-- Secret -->
                        <td style="vertical-align: middle;">
                            <code>{{ client.secret }}</code>
                        </td>

                        <!-- Edit Button -->
                        <td style="vertical-align: middle;">
                            <a class="waves-effect waves-light btn" @click="edit(client)">
                                Edit
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td style="vertical-align: middle;">
                            <a class="waves-effect waves-light btn red" @click="destroy(client)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Client Modal -->
        <div id="modal-create-client" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Create Client</h4>
                <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                    <p><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in createForm.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Client Form -->
                <form class="form-horizontal" role="form">
                    <!-- Name -->
                    <div class="input-field">

                        <div class="col-md-7">
                            <input id="create-client-name" type="text" class="form-control"
                                   @keyup.enter="store" v-model="createForm.name"/>
                            <label for="create-client-name" class="col-md-3 control-label">Name</label>
                            <span class="help-block">Something your users will recognize and trust.</span>
                        </div>
                    </div>

                    <!-- Redirect URL -->
                    <div class="input-field">
                        <input id="redirect_url" type="text" class="form-control" name="redirect"
                               @keyup.enter="store" v-model="createForm.redirect"/>
                        <label for="redirect_url" class="col-md-3 control-label">Redirect URL</label>
                        <span class="help-block">Your application's authorization callback URL.</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                <button type="button" class="btn btn-primary" @click="store">
                    Create
                </button>
            </div>
        </div>

        <!-- Edit Client Modal -->
        <div class="modal modal-fixed-footer" id="modal-edit-client">
            <div class="modal-content">
                <h4 class="modal-title">
                    Edit Client
                </h4>
                <!-- Form Errors -->
                <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                    <p><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in editForm.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Edit Client Form -->
                <form class="form-horizontal" role="form">
                    <!-- Name -->
                    <div class="input-field">
                        <input id="edit-client-name" type="text" class="form-control"
                               @keyup.enter="update" v-model="editForm.name">
                        <label for="edit-client-name" class="col-md-3 control-label">Name</label>

                        <span class="help-block">Something your users will recognize and trust.</span>
                    </div>

                    <!-- Redirect URL -->
                    <div class="input-field">
                        <input id="edit_redirect_url" type="text" class="form-control" name="redirect"
                               @keyup.enter="update" v-model="editForm.redirect">
                        <label for="edit_redirect_url" class="col-md-3 control-label">Redirect URL</label>

                        <span class="help-block">Your application's authorization callback URL.</span>
                    </div>
                </form>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat " data-dismiss="modal">Close</button>

                    <button type="button" class="waves-effect waves-green btn blue" @click="update">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                clients: [],

                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getClients();

                $('#modal-create-client').on('shown.bs.modal', () => {
                    $('#create-client-name').focus();
                });

                $('#modal-edit-client').on('shown.bs.modal', () => {
                    $('#edit-client-name').focus();
                });
            },

            /**
             * Get all of the OAuth clients for the user.
             */
            getClients() {
                axios.get('/oauth/clients')
                    .then(response => {
                        this.clients = response.data;
                    });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateClientForm() {
                $('#modal-create-client').modal('open');
            },

            /**
             * Create a new OAuth client for the user.
             */
            store() {
                this.persistClient(
                    'post', '/oauth/clients',
                    this.createForm, '#modal-create-client'
                );
            },

            /**
             * Edit the given client.
             */
            edit(client) {
                this.editForm.id = client.id;
                this.editForm.name = client.name;
                this.editForm.redirect = client.redirect;

                $('#modal-edit-client').modal('open');
            },

            /**
             * Update the client being edited.
             */
            update() {
                this.persistClient(
                    'put', '/oauth/clients/' + this.editForm.id,
                    this.editForm, '#modal-edit-client'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getClients();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        $(modal).modal('close');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given client.
             */
            destroy(client) {
                axios.delete('/oauth/clients/' + client.id)
                    .then(response => {
                        this.getClients();
                    });
            }
        }
    }
</script>
