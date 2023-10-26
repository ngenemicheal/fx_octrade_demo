
var times = [3120, 4442, 5224, 7510, 8636, 16002, 17222, 100, 435, 6849,];
var names = ['Gail Johnson','Christiana Esoun','David Alan','Kathy Davis','Susan Zayed','Alice Ella','Hosin Mokadem','Tony Rot','Tenny Mall','Zoy Jackson']
var words = ['CONFIRMED CHARGE','WITHDRAWN','INVESTED','WITHDRAWN','CONFIRMED CHARGE','WITHDRAWN','INVESTED','CONFIRMED CHARGE','DEPOSIT','CONFIRMED CHARGE'];
var countries = ['eng','us','eng_flage','fn','rus_flage','chn_flage','frn_flage'];
var themeInterval = setInterval('notification()', time());

function time() {
    return   times[parseInt(Math.random()*10)] + 2000;
}
function notification() {
    spop({
        template: '<div class="sale_notification d-flex align-items-center"><img src="assets/images/eng_flage.png" alt="" /> <div class="notification_inner"> <h3>$'+Math.floor(Math.random()*6000 + 300)+'</h3><p>'+' '+words[Math.floor(Math.random()*10)]+' BY <br><h3>'+names[Math.floor(Math.random()*10)]+'</p></div></div>',
        group: 'submit-satus',
		style     : 'nav-fixed',// error or success
        position  : 'bottom-left',
        autoclose: 3000,
        icon: false
    });
    clearInterval(themeInterval);
    themeInterval = setInterval('notification()', time());
}
