<template>
    <div class="container p-5">

        <input type="text" v-model="q" min="3" max="12" class="form-control mb-4" placeholder="Meklēt">

        <div class="invalid-feedback d-block" v-if="error">{{ error }}</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ "Persona" }}</th>
                    <th scope="col">{{ "Persons kods" }}</th>
                    <th scope="col">{{ "Sūdzības" }}</th>
                    <th scope="col">{{ "Datums" }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody v-if="items.length">
                <tr v-for="item in items">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.person.name }} {{ item.person.surname }}</td>
                    <td>{{ item.person.personal_code }}</td>
                    <td>{{ item.complaints }}</td>
                    <td>{{ item.date_formatted }}</td>
                    <td>
                        <a href="#" @click.prevent="remove(item)" class="text-danger">{{ "Dzēst" }}</a>
                        <a href="#" @click.prevent="removeForce(item)" class="text-truncate">{{ "Dzēst mūžīgi" }}</a>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6">
                        {{ "Nekas nav atrasts" }}
                    </td>
                </tr>
            </tbody>
        </table>

        <Modal v-if="showModal" v-on:closeModal="hideModal" v-on:secondStep="secondStep" :general="general" />

        <ModalSecondStep v-if="showSecondStepModal" v-on:closeModel="hideModal" :general="general" :inspection="inspection" />

        <a href="#" class="btn btn-primary" @click.prevent="showModal=true">Izveidot ierakstu</a>
    </div>
</template>

<script>
import "bootstrap"
import axios from 'axios';
import Modal from './components/ModalComponent.vue';
import ModalSecondStep from './components/ModalSecondStepComponent.vue';
import _ from 'lodash';

export default {
    components: {Modal, ModalSecondStep},
    data: () => ({
        inspection: {},
        showModal: false,
        showSecondStepModal: false,
        general: null,
        items: [],
        error: null,
        q: null
    }),
    methods: {
        hideModal() {
            this.showModal = false;
            this.showSecondStepModal = false;

            this.getData();
        },
        secondStep(inspection) {
            this.inspection = inspection;
            this.showModal = false;
            this.showSecondStepModal = true;
        },
        getData() {
            axios.get('/api/inspection', {'params': {'q': this.q}})
                .then(function (response) {
                    this.items = response.data.data;
                }.bind(this))
                .catch(function (error) {
                    alert(error.message);
                });
        },
        getGeneralDetails() {
            axios.get('/api/general')
                .then(function (response) {
                    this.general = response.data.data;
                }.bind(this))
                .catch(function (error) {
                    alert(error.message);
                });
        },
        remove(item) {
            axios.delete('/api/inspection/'+item.id)
                .then(function (response) {
                    this.getData();
                }.bind(this))
                .catch(function (error) {
                    alert(error.message);
                });
        },
        removeForce(item) {
            axios.delete('/api/inspection/force/'+item.id)
                .then(function (response) {
                    this.getData();
                }.bind(this))
                .catch(function (error) {
                    alert(error.message);
                });
        },
        checkQuery: function () {
            this.error = null;

            if (this.q && this.q.length < 3) {
                this.error = 'Ievadiet pirmās trīs vērtības';
            }

            if (this.q && this.q.length > 12) {
                this.error = 'Ievadiet maksimums 12 vērtības';
            }

            if (this.q && !this.q.match(/^\d|-$/)) {
                this.error = 'Ievadītas nepareizas vērtības';
            }

            return !this.error;
        }
    },
    created() {
        this.getGeneralDetails();
        this.getData();
    },
    watch: {
        q:  _.debounce(function() {
            if (this.checkQuery()) {
                this.getData()
            }
        }, 200)
    }
}
</script>
