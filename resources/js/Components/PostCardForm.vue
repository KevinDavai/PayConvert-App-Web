<template>
    <form enctype="multipart/form-data" class="form-floating" :action="route('profile.post_card')" method="POST" id="cardForm" @submit.prevent="storeCard" @keydown="clearError">
        <div>

                <div class="alert alert-danger alert-dismissible" v-if="checkIfError() > 0">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Veuillez remplir correctement les champs ci-dessous.
                </div>
                

            <div class="form-floating mb-3">
                <input type="email" class="form-control form-control-lg" :class="hasError('paypalMail') ? 'is-invalid' : ''" id="floatingInputValue1" placeholder="ADRESSE PAYPAL" name="paypalMail" v-model="formData.paypalMail"/>
                <label for="floatingInputValue1">ADRESSE EMAIL PAYPAL*</label>

            </div>

            

            <div class="form-floating mb-3">
                <select class="form-control form-control-lg mb-4 p-t1-5-rem" id="floatingInput2" v-model="formData.type" name="type" required>
                    <option value="Junior">Junior</option>
                    <option value="Classique" :selected="true">Classique</option>
                </select>
                <label for="floatingInput2">Type*</label>
            </div>

            <div class="d-flex flex-sm-column-max">
                <div class="form-floating mb-3 mr-sm-0-max mr-sm-5 ">
                    <input type="text" class="form-control form-control-lg mb-4" :class="hasError('code') ? 'is-invalid' : ''" id="floatingInputValue3" placeholder="CODE PIN" name="code" v-model="formData.code"/>
                    <label for="floatingInputValue3">CODE PIN*</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control form-control-lg mb-4"  id="floatingInputValue3" placeholder="Valeur" name="value" v-model="formData.value"/>
                    <label for="floatingInputValue3">VALEUR*</label>
                </div>
            </div>
            <input type="hidden" name="_token" :value="csrf">
        </div>
    </form>
    <div class="col p-0 mb-5">
        <a type="button" class="btn btn-outline-info waves-effect mr-3">Annuler</a>
        <input type="submit" :disabled="hasAnyError" form="cardForm" class="btn btn-info waves-effect waves-light ml-sm-0-max ml-sm-4 btn btn-info waves-effect waves-light ml-sm-0-max ml-sm-4 mb-sm-5-max" value="Soumettre">
    </div>
</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'PostCardForm',
    mixins: [FormEdit],
    data(){
        return{
            whatIsChanging: 'Card',
            formData: {
                paypalMail: null,
                value: null,
                code: null,
                type: 'Classique',
            }
        }
    },
    methods:{
        storeCard(){
            this.post(route('profile.post_card'), this.formData)
         },   
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },  
}
</script>