<template>
    <!-- Our Feature Section starts -->
    <section class="our-feature-section vld-parent" ref="formContainer">
        <div class="container">
            <div class="" id="errorsdiv" style="display: none;"></div> 
            <form class="form" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group">
                    <button id="submitbtn" v-on:click="submitform" type="button" class="btn btn-primary uppercase mt-ladda-btn ladda-button" data-style="zoom-in">
                        <span class="ladda-label">
                            <i class="glyphicon glyphicon-saved"></i>
                            Register
                        </span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- Our Feature Section Clsoe -->
</template>
<script>
    export default {
        methods:{
            submitform(){ 
              ajax(route('registeruser'),'POST',$('.form').serialize(),document.getElementById("submitbtn"),this);
            }
        }
    }
</script>
