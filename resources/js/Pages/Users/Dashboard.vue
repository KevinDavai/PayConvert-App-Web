<template> 

  <user-layout>

      <template #header>
        <h1 class="m-0"></h1>
      </template>

      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Argent convertis</span>
                  <span class="info-box-number">{{ this.money }}€</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

                        <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-blueMe whiteimportant  elevation-1"><i class="fas fa-money-check-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Carte(s) Acceptée(s)</span>
                  <span class="info-box-number">{{ this.Accepted }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-orangeMe whiteimportant elevation-1"><i class="far fa-clock"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Cartes(s) en attente(s)</span>
                  <span class="info-box-number">{{ this.Pending }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text fw-bold">Cartes(s) refusée(s)</span>
                  <span class="info-box-number">{{ this.Refused }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
            

              <!-- TABLE: LATEST ORDERS -->
              <div class="card no-align-items">
                <div class="card-header border-transparent">
                  <div class="card-header border-transparent d-flex align-items-center">
                    <div class="d-flex">
                      <h3 class="card-title">Vos cartes</h3>
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
  </user-layout>
</template>

<script>
$(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()
});
import UserLayout from '@/Layouts/UserLayout'
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
import Pagination from 'v-pagination-3'
import MyPagination from '@/Components/Pagination.vue'

    export default {
      components: { UserLayout, VueSlider, Pagination, MyPagination },
      data() {
        return{
            cards: [],
            search: [],
            Pending: null,
            Accepted: null,
            Refused: null,
            statusFiltre: 'all',
            money: null,
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
      },

      created() {
        this.getAllCards();
        this.getCardsStatus();
        this.getMoneyFromUser();
      },

      methods: {
        getAllCards() {
            axios.get(route('api.getListCard')).then((res) => {
                this.cards = res.data;
            });
        },
        getCardsStatus() {
          axios.get(route('cards_get_statusFromUser')).then((res) => {
            this.Pending = res.data.nbPendingCards;
            this.Accepted = res.data.nbAcceptedCards;
            this.Refused = res.data.nbRefusedCards;
          });
        },
        getMoneyFromUser() {
          axios.get(route('cards_get_moneyFromUser')).then((res) => {
            this.money = res.data.money;
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
        }
      },
    }
</script>
