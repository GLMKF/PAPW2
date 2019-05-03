<template>
<li class="ml-3 dp-flex align-self-end">
        <div v-if="!user.hide"
        class="card bg-secondary card-size"
        style="background-color: #cacaca !important; height:30px; width:150px; flex-direction: unset;">
            <div class="focus-click header-user mb-1"
            v-on:click="user.hide = scrollToEnd();">
                <label class="text-white focus-click" style="background-color: #cacaca !important; font-size:14px; color:#fff !important; margin:auto;padding:0;">
                    <b>{{user.name}}</b>
                </label>        
            </div>
            <button v-on:click="removeChild" type="button" class="close mb-1" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div 
        v-else
        class="card bg-secondary card-size">
            <div v-on:click="user.hide = false"
            class="card-header focus-click m-0 p-0 d-flex">
                <div class="focus-click header-user mt-1">
                    <b class="text-justify" style="background-color: #cacaca !important; font-size:14px; color:#fff !important;">{{user.name}}</b>
                </div>
                <button v-on:click="removeChild" type="button" class="close mb-1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="chat" class="card-body container-fluid m-0 p-3" style="height:400px; overflow-y: auto;">
                <div 
                v-for="message in messages"
                class="row item-message"
                v-bind:class="{me: is_me(message)}">
                        <div class="card">
                            <div class="desc-message">
                                <p>{{message.desc}}</p>
                            </div>
                            <div class="time-message">
                                <p>{{message.time_send}}</p>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <input v-model="send_message" class="form-control" type="text" name="message" placeholder="Message..."/>
                    <button v-on:click="send()">Enviar</button>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        props: {
           user: Object,
           childNumber: Number,
           me: Number,
           isHidden: Boolean
        },
        data() {
            return {
                isDestroy: false,
                send_message: "",
                messages: []
            }
        },
        mounted() {
            console.log('Chat ' + this.user.name + ' display!!!');
            this.ansyc_listener_messages();
        },
        methods: {
            removeChild: function() {
                this.$emit('removeChild', this.childNumber);
            },
            show_chat: function(user) {
                this.bowser_user = "";
                return false;
            },
            is_me: function(message) {
                return message.idUserSend == this.me ? true : false;
            },
            scrollToEnd: async function() {    	
                await this.timeout(300);
                var container = this.$el.querySelector("#chat");
                if(!container)
                    return false;
                container.scrollTop = container.clientHeight;
                return true;
            },
            send: function() {
                if(!this.send_message || !this.send_message.trim())
                    return true;

                axios.post('http://127.0.0.1:8000/send',{
                    idRecive: this.user.id,
                    idSend: this.me,
                    desc: this.send_message
                })
                .then((res) => {
                    console.log(res.data);
                    this.messages.push(res.data);
                })
                .catch((err) => {
                    console.log(err)
                });
                this.send_message = "";
                this.scrollToEnd();
                return true;
            },
            timeout: function(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            },
            ansyc_listener_messages: async function() {
                var goOn = true;
                while (goOn) {
                    var new_message = false;
                    console.log('Buscando mensajes... asnyc');
                    await axios.post('http://127.0.0.1:8000/messageLast',{
                        idUser: this.user.id,
                        me: this.me,
                        last_id: this.messages[this.messages.length-1] ? this.messages[this.messages.length-1].id : 0
                    })
                    .then((res) => {
                        if(res.data.length != 0 ? true : false) {
                            if(this.messages.length == 0 ? true : false)
                                this.messages = res.data;
                            else
                                this.messages = this.messages.concat(res.data);
                            new_message = true;
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    });
                    if(new_message)
                        this.scrollToEnd();
                    await this.timeout(5000);
                }
            }
        }
    }
</script>

<style>
    .header-user {
        display:inline-block; 
        flex:1;
        text-align:center;
    }
    .focus-click:hover {
        cursor: pointer;
    }
    .card-size {
        width: 200px;
    }
    .item-message div {
        max-width: 190px;
        display:-webkit-inline-box;
        background:#fff;
        color:#000;
        margin:5px;
        font-size: 10px;
    }
    .me {
        display:flex;
        justify-content: flex-end;
    }
    .me div {
        background:#dcf8c6;
    }
    .item-message p {
        margin: 0;
        padding: 0;
        display:flex;
        background: none;
    }
    .desc-message {
        text-align: justify;
        font-weight: bold;
    }
</style>