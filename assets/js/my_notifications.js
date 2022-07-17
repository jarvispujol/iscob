/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function notify(data){
    $.notify({
            icon: data.icon,
            message: data.msg

        }, {
            type: data.type,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: data.delay,
        });
    }


