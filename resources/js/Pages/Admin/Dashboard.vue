<template> 

  <admin-layout>

      <template #header>
        <h1 class="m-0"></h1>
      </template>

      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
        

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
            

              <!-- TABLE: LATEST ORDERS -->
              <div class="card no-align-items">
                <div class="card-header border-transparent">
                  <div class="card-header border-transparent d-flex align-items-center">
                    <div class="d-flex">
                      <h3 class="card-title">Toutes les cartes</h3>
                    </div>
                    <div class="d-flex align-items-center ms-auto">
                      <button  type="button" id="dropdownPrice" data-toggle="dropdown" aria-expanded="false" class="btn btn-outline-filtre waves-effect dropdown-toggle mb-0 mx-2">
                        Price
                      </button>
                      <div class="dropdown-menu">
                        <div class="p-3 d-flex flex-column">
                          <div class="d-flex justify-content-center">
                            <span class="info-box-text fw-bold purple-mine">{{ value[0] }} € </span>
                            <span class="info-box-text fw-bold px-2"> à </span>
                            <span class="info-box-text fw-bold purple-mine"> {{ value[1] }} €</span>
                          </div>
                          <vue-slider v-model="value" :width="500" :interval="5" :min="0" :max="1000" :tooltip-placement="['bottom', 'bottom']" :enable-cross="false" :process-style="{ backgroundColor: 'purple' }" :tooltip-style="{ backgroundColor: 'purple', borderColor: 'purple' }"></vue-slider>
                        </div>
                      </div>              
                      <div class="form-group mb-0 mx-2">
                        <div class="input-group mt-0 align-items-center">
                          <input type="search" v-model="this.keyword" class="form-control form-control" placeholder="Mot clé...">
                          <div class="input-group-append align-items-center">
                            <button type="submit" @on-click="updateKeyword" class="btn btn-default mb-0">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" v-model="statusFiltre">
                          <option :selected="true" value="all">Tout les status</option>
                          <option value="Accepted">Acceptée</option>
                          <option value="Pending">En attente</option>
                          <option value="Refused">Refusée</option>
                        </select>
                      </div>
                    </div>    
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Email Paypal</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Montant</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr v-for="(card, index) in computedCards.slice(index,index+5)">
                        <td>
                          <input class="form-control" type="text" :value="card.emailPaypal" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td>
                          <input class="form-control" type="text" :value="card.code" aria-label="Disabled input example" disabled readonly>
                        </td>
                        <td v-if="card.status == 'Pending'"><span class="badge badge-warning mt-11-px">En attente</span></td>
                        <td v-if="card.status == 'Accepted'"><span class="badge badge-success mt-11-px">Acceptée</span></td>
                        <td v-if="card.status == 'Refused'"><span class="badge badge-danger mt-11-px">Refusée</span></td>
                        <td>
                          <div class="sparkbar mt-11-px" data-color="#00a65a" data-height="20">{{ card.value }}</div>
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Third group">
                            <button type="button" class="btn btn-primary btn-edit btn-edit-cards-admin" @click="editModal(card)">
                              <i class="fas fa-pen"></i>
                            </button>
                          </div>
                        </td>
                      </tr>            
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <nav>
                      <ul>
                          <li @click="setPreviousPage" v-if="this.index != 0">
                              <button type="button"></button>
                          </li>
                          <li @click="setNextPage" v-if="this.index < this.computedCards.length - 5">
                              <button type="button"></button>
                          </li>              
                      </ul>
                  </nav>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>

      <!--Modal: modalPush-->
      <div class="modal fade" id="editCard" tabindex="-2" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-notify modal-info" role="document">
              <!--Content-->
              <div class="modal-content text-center">
                <div class="modal-header d-flex justify-content-center">
                    <p class="heading">
                        Veuillez mettre à jour la carte
                    </p>
                </div>
                <!--Body-->
              
                <div class="modal-body">

                    <form enctype="multipart/form-data" class="form-floating" :action="route('admin.dashboard.editCard')" method="POST" id="cardForm"  @submit.prevent="storeEdit">
                      <div class="form-floating mb-3">
                          <input type="email" class="form-control form-control-lg" id="floatingInputValue1" placeholder="ADRESSE PAYPAL" name="paypalMail" v-model="this.form.emailPaypal" readonly/>
                          <label for="floatingInputValue1">ADRESSE EMAIL PAYPAL*</label>

                      </div>

            

                      <div class="form-floating mb-3">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control form-control-lg mb-4" id="floatingInputValue3" placeholder="CODE PIN" name="code" v-model="this.form.code" readonly/>
                              <label for="floatingInputValue3">CODE PIN*</label>
                          </div>
                      </div>

                      <div class="d-flex">

                          <div class="form-floating mb-3 mr-3">
                              <input type="number" class="form-control form-control-lg mb-4"  id="floatingInputValue3" placeholder="Valeur" name="value" v-model="this.form.value" readonly/>
                              <label for="floatingInputValue3">VALEUR*</label>
                          </div>

                        <div class="form-floating mb-3">
                              <select class="form-control form-control-lg mb-4 p-t1-5-rem" id="floatingInput2" v-model="this.form.status" name="type" required>
                                <option :selected="true" value="Accepted">Acceptée</option>
                                <option value="Pending">En attente</option>
                                <option value="Refused">Refusée</option>
                              </select>
                              <label for="floatingInput2">Status*</label>
                          </div>
                      </div>
                        <input type="hidden" name="_token" :value="csrf">
                    </form>
                </div>

                    <!--Footer-->
                <div class="modal-footer flex-center">    
                    <input type="submit" form="cardForm" class="btn btn-info waves-effect waves-light" value="Confirmer">                    
                    <a
                        type="button"
                        class="btn btn-outline-info waves-effect"
                        data-dismiss="modal"
                        >Annuler</a
                    >
                </div>
              </div>
          </div>
      </div>
  </admin-layout>
</template>

<script>
$(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()
});

import AdminLayout from '../../Layouts/AdminLayout.vue'
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
import Pagination from 'v-pagination-3'
import MyPagination from '@/Components/Pagination.vue'
import EditCard from '@/Components/EditCard.vue'

    export default {
      components: { AdminLayout, VueSlider, Pagination, MyPagination, EditCard },
      data() {
        return{
            cards: [],
            search: [],
            statusFiltre: 'all',
            keyword : '',
            value: [0, 1000],
            options:{
                format: true,
                chunk: 1,
                chunksNavigation:'scroll',
                edgeNavigation: true,
                theme:'bootstrap3',
                template:MyPagination,
                texts:{
                    count:'Showing {from} to {to} of {count} records|{count} records|One record',
                    first:'First',
                    last:'Last',
                    nextPage:'>',
                    nextChunk:'>>',
                    prevPage:'<',
                    prevChunk:'<<'
                }
            },
            index: 0,
            form: {
              id: '',
              emailPaypal: '',
              code: '',
              value: '',
              status: '',
            }
        }
      },
      computed: {
        computedCards: function () {
          this.index = 0;
          return this.cards.filter((item) => {
            return (this.value[0] === 0 && this.value[1] === 1000 || item.value >= this.value[0] && item.value < this.value[1])
                    && (this.keyword.length === 0 || item.emailPaypal.includes(this.keyword) || item.code.includes(this.keyword))
                    && (this.statusFiltre === 'all' || item.status.includes(this.statusFiltre))
          })
        },
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
      },

      created() {
        this.getAllCards();
      },

      methods: {
        getAllCards() {
            axios.get(route('api.getAllCard')).then((res) => {
                this.cards = res.data;
            });
        },
        updateKeyword() {
          console.log(this.keyword);
        },
        setPreviousPage() {
          if(this.index != 0) {
            this.index = this.index - 5;
          }
        },
        setNextPage() {
          if(this.index < this.computedCards.length - 5) {
            this.index = this.index + 5;
          }
        },
        editModal(card) {
          console.log(card);
          $('#editCard').modal('show')
          this.form.id = card.id
          this.form.emailPaypal = card.emailPaypal
          this.form.code = card.code
          this.form.value = card.value
          this.form.status = card.status
        },
        storeEdit() {
          axios.post(route('admin.dashboard.editCard'), this.form).then((res) => {
            $('#editCard').modal('hide');
            this.getAllCards()
          });
        }
      },
    }
</script>

