<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User List</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="user in list">
                                {{ user.name }}
                            </li>
                        </ul>
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
                list : []
            }
        },
        created : function() {

            $.getJSON('/users?json', function(data) {
                console.log(data.users.data);
                this.list = data.users.data;
                console.log(this.list);
            }.bind(this));
        }
    }
</script>
