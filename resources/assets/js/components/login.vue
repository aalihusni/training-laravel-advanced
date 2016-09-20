<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus v-model="email">

                                
                                    <span class="help-block">
                                        <strong>{{ email }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required v-model="password">

                                    <span class="help-block">
                                        <strong></strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" v-model="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a class="btn btn-primary" v-on:click="login">
                                    Login
                                </a>

                                <a class="btn btn-link" v-on:click="reset">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
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
        data : function () {
            return {
                email : '',
                password : '',
                remember : false
            };
        },
        methods : {
            login : function() {
                var data = {
                    email : this.email,
                    password : this.password,
                    remember : this.remember
                };
                console.log(data);
                $.post('/login', data, function(data, textStatus, xhr) {
                    console.log(data);
                });
            },
            reset : function() {

            }
        }
    }
</script>
