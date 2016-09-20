<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <input type="text" name="name" v-model="name">
                        <p>Your name is {{ name }}</p>
                        <div class="btn btn-default" v-on:click="alert">Alert me</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        ready() {
            console.log('Component ready.')
        },
        data : {
            name: ''
        },
        methods : {
            alert : function() {
                alert(1);
            }
        }
    }
</script>
