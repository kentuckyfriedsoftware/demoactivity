define(['jquery'], function($) {
    return {
        init: function() {
            // Fill in the mod_demoactivity settings from M
            for(let i=1;i<5;i++) {
                if(undefined === M.mod_demoactivity['setting' + i]) {
                    document.querySelector('#M_mod_demoactivity_setting' + i).textContent = 'undefined';
                } else {
                    document.querySelector('#M_mod_demoactivity_setting' + i).textContent = M.mod_demoactivity['setting' + i];
                }
            }
        }
    };
});

