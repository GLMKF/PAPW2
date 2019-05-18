<template>
    <div class="row">
        <template v-if="showField">
            <div class="form-group standard">
                <label for="desc">Describe acontinuacion una plaza de estudios donde hayas estado</label>
            </div>
            <div class="form-group">
                <label for="position">Posición que desarrolló:</label>
                <input type="text" class="form-control" id="position" name="position" required v-model="newItem.position" placeholder="Ej. Licenciatura en ...">
            </div>
            <div class="form-group">
                <label for="institution">Institución donde desarrolló:</label>
                <input type="text" class="form-control" id="institution" name="institution" required v-model="newItem.institution" placeholder="Ej. UANL">
            </div>
            <div class="form-group">
                <label for="finish">Período de tiempo:</label>
                <input type="text" class="form-control" id="finish" name="finish" required v-model="newItem.finish" placeholder="Ej. 2007 - 2013">
            </div>
            <div class="form-group">
                <label for="description">Descripción general de la institucion y sus asignaturas:</label>
                <textarea  rows="5" class="form-control" id="description" name="description" required v-model="newItem.description" style="" placeholder="Ej. La carrera cuenta con un giro para que los estudiantes sean capaces de crear secuencias de codigo para soluciones empresariales."></textarea>
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
                <div class="education margin-b-50">
                    <h4><b>{{ item.position }}</b></h4>
                    <h5 class="font-yellow"><b>{{ item.institution }}</b></h5>
                    <h6 class="font-lite-black margin-t-10">{{ item.finish }}</h6>
                    <p class="margin-tb-30">{{ item.description }}</p>
                </div><!-- experience -->
            </div><!-- col-sm-9 -->
        </template>
        <template v-if="!showField">
            <div>
                <button @click.prevent="showField=true" class="btn btn-primary" style="float:left;">
                    <span class="glyphicon glyphicon-plus"></span> Nuevo nivel de estudios
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
              newItem: { 'user': '','position' : '','institution' : '','finish': '','description' : '' },
              showField: false
            }
        },
        mounted() {
            this.getVueItems();
            console.log('Component Education mounted.');      
        },
        methods: {
            createItem: function createItem() {
                var _this = this;
                this.newItem.user = this.email;
                var input = this.newItem;
            
                if (input['position'] == '' || input['institution'] == '' || input['finish'] == '' || input['description'] == '') {
                    this.hasError = false;
                } else {
                    this.hasError = true;
                    console.log('validado');
                    axios.post('/storeEducation', input).then(function (response) {
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
            },
            getVueItems: function getVueItems() {
                var _this = this;
                axios.get('/getEducation',{
                    params: {
                        email: this.email
                        }
                    }).then(function (response) {
                    _this.items = response.data.education;
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