//item là những row: 1 ,2,3 ,4 ,5,7,8,9,10,11,12,13,14

//trang 1:0,1,2,3
//trang 2:4,5,6,7
//trang 3:8,9,10,11
//......

//itemPerPage=4(số item trong 1 page)
// currentPage=1(currentPage là trnag hiện tại, hiện tại đang ở trang 1)

// start=0 (phần tử đầu trong trang 1)
// end=itemParPage(phần tử cuối trong trang 1)

//  Tổng quát
//      start = ( currentPage-1 ) * itemParPage
//      end = currentPage * itemPerPage
const job = [
    { id: 1, namejobs: "DevOps Engineer", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 2, namejobs: "Java - Need programmer", level: "Partime", namecompany: "VKU Group", location: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 3, namejobs: "ReactJS Developer", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 4, namejobs: "UI-UX Designer - Designer", level: "Partime", namecompany: "TMA Solution", location: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 5, namejobs: "DevOps Engineer 2", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 6, namejobs: "Java - Need programmer 2", level: "Partime", namecompany: "VKU Group", location: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 7, namejobs: "ReactJS Developer 2", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 8, namejobs: "UI-UX Designer - Designer 2", level: "Partime", namecompany: "TMA Solution", location: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 9, namejobs: "DevOps Engineer 3 ", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 10, namejobs: "Java - Need programmer 3", level: "Partime", namecompany: "VKU Group", location: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 11, namejobs: "ReactJS Developer 3", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 12, namejobs: "UI-UX Designer - Designer 3", level: "Partime", namecompany: "TMA Solution", location: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 13, namejobs: "DevOps Engineer 4", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 14, namejobs: "Java - Need programmer 4", level: "Partime", namecompany: "VKU Group", location: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 15, namejobs: "ReactJS Developer 4", level: "Partime", namecompany: "Enouvo IT Solution", location: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 16, namejobs: "UI-UX Designer - Designer 4", level: "Partime", namecompany: "TMA Solution", location: "Quận Hải Châu, Thành Phố Đà Nẵng" },


]
let perPage = 4;
let currentPage = 1;
let start = 0;
let end = perPage;
let totalPage = Math.ceil(job.length / perPage);
function getCurrentPage(currentPage) {
    start = (currentPage - 1) * perPage;
    end = currentPage * perPage;
    console.log(start,end)
}
function rederJob() {
    html = '';
    const content = job.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="row-recent1 reveal">';
            html += '<div class="row-recent-container " style="justify-content: space-between;">';
            html += '<div class="row-item">'
            html += '<div class="name-job">'
            html += '<h2 class="name">'+item.namejobs+'</h2>'
            html += ' <div class="level">';
            html += ' <span class="sp-level">'+item.level+'</span>';
            html += ' </div>';
            html += ' </div>';
            html += '<div class="address-job">';
            html += '<div class="company">';
            html += ' <i class="ti-layers-alt"></i>';
            html += ' <a href="" class="company-name">'+item.namecompany +'<a>';
            html += ' </div>';
            html += '<div class="address">';
            html +='<i class="ti-location-pin"></i>';
            html +='<span class="name-address">'+item.location+'</span>';
            html +='</div>';
            html +='</div>';
            html +='</div>';
            html +=' <div class="apply">';
            html +=' <a href="Search.php" class="apply-job">Xem Công Việc</a>';
            html +='</div>';
            html +='</div>';
            html +='</div>';

            return html;
        }

    })
    document.getElementById('list__jobs').innerHTML = html;
}
function rederListPage() {
    let html = '';

    html += '<li class="active"><a href="#">1</a></li>';
    for (let i = 2; i <= totalPage; i++) {
        html += '<li><a href="javascript:void(0);">'+i+'</a></li>';
    }
    document.getElementById('number-page').innerHTML = html;
}
rederJob();
rederListPage();
function changePage() {
    const currentPages = document.querySelectorAll('.number-page li');
    console.log(currentPages);
    for (let i = 0; i < currentPages.length; i++) {
        currentPages[i].addEventListener('click', () => {
            let value = 1 + i;
            currentPage = value;
            $('.number-page li').removeClass('active');
            currentPages[i].classList.add('active');
            getCurrentPage(currentPage);
            if(currentPage === totalPage){
                $('.btn-prev').removeClass('btn-active');
                $('.btn-next').addClass('btn-active');
            }else if(currentPage === 1){
                $('.btn-next').removeClass('btn-active');
                $('.btn-prev').addClass('btn-active');
            }else{
                $('.btn-prev').removeClass('btn-active');
                $('.btn-next').removeClass('btn-active');
            }
            
            // $('.pagination .btn-prev').removeClass('btn-active');
            //  $('.pagination .btn-next').removeClass('btn-active') 
            // $('.btn-prev').removeClass('btn-active');
            // $('.btn-next').removeClass('btn-active');
            rederJob();
        })
    }
}

changePage();
const btnNext = document.querySelector('.btn-next');
const btnPre = document.querySelector('.btn-prev');

btnNext.addEventListener('click', () => {
    currentPage++;

    if (currentPage >= totalPage) {
        currentPage = totalPage;
    }
    if (currentPage === totalPage) {
        $('.btn-next').addClass('btn-active');
    }
    $('.number-page li').removeClass('active');
    $('.btn-prev').removeClass('btn-active');
    $(`.number-page li:eq(${currentPage-1})`).addClass('active');
    console.log(start, end);
    getCurrentPage(currentPage);
    rederJob();
})

btnPre.addEventListener('click', () => {
    currentPage--;

    if (currentPage <= 1) {
        currentPage = 1;
    }
    if (currentPage === 1) {
        $('.btn-prev').addClass('btn-active');
    }
    $('.number-page li').removeClass('active');
    $('.btn-next').removeClass('btn-active');
    $(`.number-page li:eq(${currentPage-1})`).addClass('active');


    console.log(start, end);
    getCurrentPage(currentPage);
    rederJob();
})