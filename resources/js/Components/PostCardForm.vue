<template>
    <form enctype="multipart/form-data" class="form-floating" :action="route('profile.post_card')" method="POST" id="cardForm" @submit.prevent="storeCard" @keydown="clearError">
        <div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control form-control-lg" :class="hasError('paypalMail') ? 'is-invalid' : ''" id="floatingInputValue1" placeholder="ADRESSE PAYPAL" name="paypalMail" v-model="formData.paypalMail"/>
                <label for="floatingInputValue1">ADRESSE EMAIL PAYPAL*</label>
                <small id="passwordHelp" class="text-danger" v-if="hasError('paypalMail')">             
                    {{getError('paypalMail')}}
                </small> 
            </div>

            

            <div class="form-floating mb-3">
                <select class="form-control form-control-lg mb-4 p-t1-5-rem" id="floatingInput2" v-model="formData.type" name="type" required>
                    <option value="Junior">Junior</option>
                    <option value="Classique" :selected="true">Classique</option>
                </select>
                <label for="floatingInput2">Type*</label>
            </div>

            <div class="d-flex">
                <div class="form-floating mb-3 mr-5">
                    <input type="text" class="form-control form-control-lg mb-4" :class="hasError('code') ? 'is-invalid' : ''" id="floatingInputValue3" placeholder="CODE PIN" name="code" v-model="formData.code"/>
                    <label for="floatingInputValue3">CODE PIN*</label>
                    <small id="passwordHelp" class="text-danger" v-if="hasError('code')">             
                        {{getError('code')}}
                    </small> 
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control form-control-lg mb-4"  id="floatingInputValue3" placeholder="Valeur" name="value" v-model="formData.value"/>
                    <label for="floatingInputValue3">VALEUR*</label>
                    <small id="passwordHelp" class="text-danger" v-if="hasError('value')">             
                        {{getError('value')}}
                    </small> 
                </div>
            </div>
            <input type="hidden" name="_token" :value="csrf">
        </div>
    </form>
    <div class="col ml-2 mt-5">
        <a type="button" class="btn btn-outline-info waves-effect">Annuler</a>
        <input type="submit" :disabled="hasAnyError" form="cardForm" class="btn btn-info waves-effect waves-light ml-4" value="Soumettre">
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