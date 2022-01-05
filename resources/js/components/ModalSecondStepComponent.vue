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
                                <p>{{ ("Otrais solis apmeklējuma formai") }}</p>
                            </div>

                            <h5>{{ "Deguns" }}</h5>

                            <form @submit.prevent="save" @keydown="form.onKeydown($event)">

                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <label class="form-label">{{ "Gļotāda" }}</label>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.mucosas" type="text" class="form-control">
                                                <option value="">-</option>
                                                <option v-for="(item, index) in general.mucosas" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="mucosas" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.mucosas_2" type="text" class="form-control">
                                                <option value="">-</option>
                                                <option v-for="(item, index) in general.mucosas_2" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="mucosas_2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ "Deguna ejas" }}</label>
                                    <select id="form" v-model="form.nasal_passages" type="text" class="form-control" multiple="multiple">
                                        <option v-for="(item, index) in general.nasal_passages" :value="item.id">{{ item.name }}</option>
                                    </select>
                                    <HasError :form="form" field="nasal_passages" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ "Atdalījumi" }}</label>
                                    <select id="form" v-model="form.has_separations" type="text" class="form-control">
                                        <option value="">{{ "-" }}</option>
                                        <option :value="1">{{ "Jā" }}</option>
                                        <option :value="0">{{ "Nē" }}</option>
                                    </select>
                                    <HasError :form="form" field="has_separations" />
                                </div>

                                <div class="mb-3" v-if="form.has_separations">
                                    <select id="form" v-model="form.separations" type="text" class="form-control" multiple="multiple">
                                        <option v-for="(item, index) in general.separations" :value="item.id">{{ item.name }}</option>
                                    </select>
                                    <HasError :form="form" field="separations" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ "Deguna starpsiena" }}</label>
                                    <select id="form" v-model="form.nasal_septums" type="text" class="form-control">
                                        <option value="">-</option>
                                        <option v-for="(item, index) in general.nasal_septums" :value="item.id">{{ item.name }}</option>
                                    </select>
                                    <HasError :form="form" field="nasal_septums" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ "Elpošana caur degunu" }}</label>
                                    <select id="form" v-model="form.nasal_breathing_throught_noses" type="text" class="form-control">
                                        <option value="">-</option>
                                        <option v-for="(item, index) in general.nasal_breathing_throught_noses" :value="item.id">{{ item.name }}</option>
                                    </select>
                                    <HasError :form="form" field="nasal_breathing_throught_noses" />
                                </div>

                                <h5>{{ "Mutes dobums" }}</h5>

                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <label class="form-label">{{ "Rīkle" }}</label>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.throats" type="text" class="form-control" multiple="multiple">
                                                <option v-for="(item, index) in general.throats" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="throats" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.throats_2" type="text" class="form-control" multiple="multiple">
                                                <option v-for="(item, index) in general.throats_2" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="throats_2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <label class="form-label">{{ "Mandeles" }}</label>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.almonds" type="text" class="form-control">
                                                <option value="">-</option>
                                                <option v-for="(item, index) in general.almonds" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="almonds" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="mb-3">
                                            <select id="form" v-model="form.almonds_2" type="text" class="form-control">
                                                <option value="">-</option>
                                                <option v-for="(item, index) in general.almonds_2" :value="item.id">{{ item.name }}</option>
                                            </select>
                                            <HasError :form="form" field="almonds_2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mb-3">
                                    <Button :form="form" class="btn btn-primary btn-lg">
                                        {{ "Saglabāt" }}
                                    </Button>
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
    props: ['general', 'inspection'],
    components: { DatePicker },
    data: () => ({
        form: new Form({
            mucosas: '',
            mucosas_2: '',
            nasal_passages: [],
            has_separations: '',
            separations: [],
            nasal_septums: '',
            nasal_breathing_throught_noses: '',
            throats: [],
            throats_2: [],
            almonds: '',
            almonds_2: '',
        }),
    }),
    mounted() {
        if (this.inspection.form === 'sin') {
            this.form.mucosas = 4;
            this.form.mucosas_2 = 7;
        }
        if (this.inspection.form === 'dxt') {
            this.form.nasal_passages = [2];
        }
    },
    methods: {
        save() {
            this.send()
                .then((data) => {
                    this.$emit('closeModel')
                })
                .catch(() => {

                })
        },
        send() {
            return new Promise((resolve, reject) => {
                this.form.put('/api/inspection/'+this.inspection.id).then(res => {
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
