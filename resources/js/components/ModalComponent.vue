<template>
    <div>
        <div class="modal fade show" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: block">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-close">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="$emit('closeModal')"></button>
                    </div>
                    <div class="modal-body">
                        <div id="loginModalFormLogin">
                            <div class="text-center mb-5">
                                <h3 class="modal-title">{{ ("Apmeklējuma forma") }}</h3>
                                <p>{{ ("Izveido jaunu apmeklējuma formu.") }}</p>
                            </div>

                            <form @submit.prevent="save" @keydown="form.onKeydown($event)">
                                <div class="mb-3">
                                    <label for="date" class="form-label">{{ "Datums" }}</label>
                                    <date-picker id="date" v-model="form.date" valueType="format" format="DD.MM.YYYY" :placeholder="('Ievadiet datumu')"></date-picker>
                                    <HasError :form="form" field="date" />
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ "Vārds" }}</label>
                                    <input id="name" v-model="form.name" type="text" name="name" class="form-control" :placeholder="('Ievadiet vārdu')">
                                    <HasError :form="form" field="name" />
                                </div>
                                <div class="mb-3">
                                    <label for="surname" class="form-label">{{ "Uzvārds" }}</label>
                                    <input id="surname" v-model="form.surname" type="text" name="surname" class="form-control" :placeholder="('Ievadiet uzvārdu')">
                                    <HasError :form="form" field="surname" />
                                </div>
                                <div class="mb-3">
                                    <label for="personal_code" class="form-label">{{ "Persons kods" }}</label>
                                    <input id="personal_code" v-model="form.personal_code" type="text" name="surname" class="form-control" :placeholder="('Ievadiet personas kodu')">
                                    <HasError :form="form" field="personal_code" />
                                </div>
                                <div class="mb-3">
                                    <label for="complaints" class="form-label">{{ "Sūdzības un anamnēze" }}</label>
                                    <textarea id="complaints" v-model="form.complaints" type="text" name="date" class="form-control" :placeholder="('Ievadiet sūdzības')"></textarea>
                                    <HasError :form="form" field="complaints" />
                                </div>
                                <div class="mb-3">
                                    <label for="comorbidities" class="form-label">{{ "Blakus slimības" }}</label>
                                    <input id="comorbidities" v-model="form.comorbidities" type="text" name="date" class="form-control" :placeholder="('Ievadiet blakus slīmības')">
                                    <HasError :form="form" field="comorbidities" />
                                </div>
                                <div class="mb-3">
                                    <label for="allergies" class="form-label">{{ "Medikamentu nepanesamība, alerģijas" }}</label>
                                    <input id="allergies" v-model="form.allergies" type="text" name="date" class="form-control" :placeholder="('Ievadiet alerģijas')">
                                    <HasError :form="form" field="allergies" />
                                </div>
                                <div class="mb-3">
                                    <label for="form" class="form-label">{{ "Ārējā forma" }}</label>
                                    <select id="form" v-model="form.form" type="text" name="form" class="form-control">
                                        <option value="">-</option>
                                        <option v-for="(item, index) in general.forms" :value="index">{{ item }}</option>
                                    </select>
                                    <HasError :form="form" field="form" />
                                </div>

                                <div class="d-grid mb-3">
                                    <Button :form="form" class="btn btn-primary btn-lg">
                                        {{ "Turpināt" }}
                                    </Button>
                                    <a href="" @click.prevent="$emit('closeModal')" class="mt-4">{{ "Aizvērt" }}</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    </div>
</template>

<script>
import Form from 'vform'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    props: ['general'],
    components: { DatePicker },
    data: () => ({
        form: new Form({
            name: '',
            surname: '',
            personal_code: '',
            date: '',
            complaints: '',
            comorbidities: '',
            allergies: '',
            form: '',
        }),
    }),
    methods: {
        save() {
            this.send()
                .then((data) => {
                    this.$emit('secondStep', data);
                })
                .catch(() => {

                })
        },
        send() {
            return new Promise((resolve, reject) => {
                this.form.post('/api/inspection').then(res => {
                    const { data } = res.data;
                    resolve(data);
                }).catch(() => {
                    reject();
                })
            })
        },
    },
    created() {
        document.querySelector('body').classList.add('modal-open');
        document.querySelector('body').style.overflow = 'hidden';
    },
    destroyed() {
        document.querySelector('body').classList.remove('modal-open');
        document.querySelector('body').style.removeProperty('overflow');
    },
}
</script>
