<template>
    <div class="row">
        <template v-if="showField">
            <div class="form-group standard">
                <label for="desc">Describe acontinuacion tu experiencia de trabajo para agregarla a tu CV</label>
            </div>
            <div class="form-group">
                <label for="position">Posición que desarrolló:</label>
                <input type="text" class="form-control" id="position" name="position" required v-model="newItem.position" placeholder="Ej. Ejecutivo">
            </div>
            <div class="form-group">
                <label for="institution">Institución donde desarrolló:</label>
                <input type="text" class="form-control" id="institution" name="institution" required v-model="newItem.institution" placeholder="Ej. Banamex">
            </div>
            <div class="form-group">
                <label for="finish">Período de tiempo:</label>
                <input type="text" class="form-control" id="finish" name="finish" required v-model="newItem.finish" placeholder="Ej. 2005 - Presente">
            </div>
            <div class="form-group">
                <label for="description">Descripción general del empleo:</label>
                <textarea  rows="5" class="form-control" id="description" name="description" required v-model="newItem.description" style="" placeholder="Ej. Desarrollo una posicion de ejecutivo con la finalidad de ayudar a los clientes en sus transacciones que buscan en la institucion bancaria, conosco protocolos para aperturar cuentas, cerras cuentas y hacer pagos de cualqueir índole."></textarea>
            </div>
            <div class="form-group">
                <label for="activities">Puntos a destacar:</label>
                <ul class="list" >
                    <li class="liwx"><input type="text" class="form-control" id="activity1" name="activity1" required v-model="newItem.activity1" placeholder="Ej. Compromiso con el cliente"><br></li>
                    <li class="liwx"><input type="text" class="form-control" id="activity2" name="activity2" required v-model="newItem.activity2" placeholder="Ej. Responsable en transacciones desempeñadas"></li>
                    <li class="liwx"><input type="text" class="form-control" id="activity3" name="activity3" required v-model="newItem.activity3" placeholder="Ej. Amabilidad bilateral"></li>
                </ul>
            </div>
            <div>
                <button class="btn btn-primary" @click.prevent="createItem()" style="float:left;">
                    <span class="glyphicon glyphicon-plus"></span> ADD
                </button>
                <button class="btn btn-primary" @click.prevent="cancelLng()" style="float:left;">
                    <span class="glyphicon glyphicon-plus"></span> Cancelar
                </button>
            </div>
        </template>
        <template v-for="item in items">
            <div class="col-sm-12 col-md-9">
                <div class="experience margin-b-50">
                    <h4><b>{{ item.position }}</b></h4>
                    <h5 class="font-yellow"><b>{{ item.institution }}</b></h5>
                    <h6 class="font-lite-black margin-t-10">{{ item.finish }}</h6>
                    <p class="margin-tb-30">{{ item.description }}</p>
                    <ul class="list">
                        <li>{{ item.activity1 }}</li>
                        <li>{{ item.activity2 }}</li>
                        <li>{{ item.activity3 }}</li>
                    </ul>
                </div><!-- experience -->
            </div><!-- col-sm-9 -->
        </template>
        <template v-if="!showField">
            <div>
                <button @click.prevent="showField=true" class="btn btn-primary" style="float:left;">
                    <span class="glyphicon glyphicon-plus"></span> Nueva Experiencia
                </button>
            </div>
        </template>
        <p class="text-center alert alert-danger"
            v-bind:class="{ hidden: hasError }">Please fill all fields!</p>
    </div>
</template>

<script>
   export default {
        props: {
            email:String
        },
         data() {
            return { 
              items: [], //All work experience of user
              hasError: true, //Validate
              newItem: { 'user': '','position' : '','institution' : '','finish': '','description' : '','activity1' : '','activity2' : '','activity3': '' },
              showField: false
            }
        },
        mounted() {
            this.getVueItems();
            console.log('Component Work Experience mounted.');      
        },
        methods: {
            createItem: function createItem() {
                var _this = this;
                this.newItem.user = this.email;
                var input = this.newItem;
            
                if (input['position'] == '' || input['institution'] == '' || input['finish'] == '' || input['description'] == '' || input['activity1'] == '' || input['activity2'] == '' || input['activity3'] == '') {
                    this.hasError = false;
                } else {
                    this.hasError = true;
                    console.log('validado');
                    axios.post('/storeWorkXperience', input).then(function (response) {
                    _this.newItem = { 'name': '' };
                    _this.getVueItems();
                    });
                }
            },
            cancelLng: function () {
                this.showField=false;
                this.newItem.user = '';
                this.newItem.position = '';
                this.newItem.institution = '';
                this.newItem.finish = '';
                this.newItem.description = '';
                this.newItem.activity1 = '';
                this.newItem.activity2 = '';
                this.newItem.activity3 = '';
            },
            getVueItems: function getVueItems() {
                var _this = this;
                axios.get('/getWorkXperience',{
                    params: {
                        email: this.email
                        }
                    }).then(function (response) {
                    _this.items = response.data.workXp;
                    console.log(_this.items);
                });
            }
        }
    }
</script>


<style>
.btnvue{
    background-color:#cacaca; 
    border-radius:5px;
}
.standard{
    line-height: 1; 
    float: center;
    font-size: 22px;
    padding: auto;
    margin: auto;
}
.liwx{
    display:-webkit-box;
}
</style>