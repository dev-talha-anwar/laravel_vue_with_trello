function ajax(url, type, data = '', button = null, self = null, model = null, loader = null) {
    if (button != null) {
        console.log(button);
        var l = Ladda.create(button);
        l.start();
    }
    if (self != null) {
        self.$Progress.start();
        if (loader != null) {
            self[loader] = true;
        }
    }
    axios({
            method: type,
            url: url,
            data: data,
            headers: {
                'APP-TOKEN': '1l23f134b1'
            }
        })
        .then((data) => {
            if (data.data.hasOwnProperty('errors')) {
                $("#errorsdiv").html(makeerrors(data.data.errors));
                $("#errorsdiv").css({
                    display: 'block'
                });
                if (self != null) self.$Progress.fail();
            }
            if (data.data.hasOwnProperty('msg')) {
                if (data.data.msg.type == 'success' && !data.data.hasOwnProperty('url')) {
                    self.data = data.data.data;
                }
                showbtnflag = true;
                if (data.data.hasOwnProperty('refresh')) {
                    if (data.data.refresh == true) {
                        showbtnflag = false;
                    }
                }
                if (model != null) {
                    model.modal('hide');
                }
                swal({
                    title: data.data.msg.type,
                    type: data.data.msg.type,
                    text: data.data.msg.msg,
                    showConfirmButton: showbtnflag
                });
            } else if (data.data.hasOwnProperty('data')) {
                self.data = data.data.data
                if (model != null) {
                    model.modal('hide');
                }
            }
            if (data.data.hasOwnProperty('auth')) {
                if (self != null) {
                    self.$session.set('auth', data.data.auth);
                }
            }
            if (data.data.hasOwnProperty('url')) {
                location.assign(data.data.url);
            }
            if (data.data.hasOwnProperty('refresh')) {
                if (data.data.refresh == true) {
                    location.reload();
                }
            }
        })
        .catch((error) => {
            swal({
                title: 'error',
                type: 'error',
                text: error,
                showConfirmButton: true
            });
            if (self != null) self.$Progress.fail();
        })
        .then(() => {
            if (button != null) l.stop();
            if (self != null) {
                self.$Progress.finish();
                if (loader != null) {
                    self[loader] = false;
                }
            }
        });
}

function makeerrors(errors) {
    html = '<div class="alert alert-dismissible alert-danger">' +
        '<div class="close" data-dismiss="alert">&times;</div>';
    $.each(errors, function(index, val) {
        html += val + "<br>";
    });
    html += '</div>';
    return html;
}
