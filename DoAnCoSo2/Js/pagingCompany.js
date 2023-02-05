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
    { id: 1, titlecompany: "DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer DevOps Engineer" },
    { id: 2, titlecompany: "Java - Need programmer", detailcompany: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 3, titlecompany: "ReactJS Developer", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 4, titlecompany: "UI-UX Designer - Designer", detailcompany: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 5, titlecompany: "DevOps Engineer 2", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 6, titlecompany: "Java - Need programmer 2",  detailcompany: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 7, titlecompany: "ReactJS Developer 2", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 8, titlecompany: "UI-UX Designer - Designer 2", detailcompany: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 9, titlecompany: "DevOps Engineer 3 ",  detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 10, titlecompany: "Java - Need programmer 3",  detailcompany: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 11, titlecompany: "ReactJS Developer 3", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 12, titlecompany: "UI-UX Designer - Designer 3", detailcompany: "Quận Hải Châu, Thành Phố Đà Nẵng" },
    { id: 13, titlecompany: "DevOps Engineer 4", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 14, titlecompany: "Java - Need programmer 4", detailcompany: "Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng" },
    { id: 15, titlecompany: "ReactJS Developer 4", detailcompany: "Quận Sơn trà, Thành Phố Đà Nẵng" },
    { id: 16, titlecompany: "UI-UX Designer - Designer 4", detailcompany: "Quận Hải Châu, Thành Phố Đà Nẵng" },


]
let perPage = 8;
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
            html += '<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">';
            html += '<div class="post-box">';
            html += '<div class="post-img"><img src="Img/blog/blog-1.jpg" class="img-fluid" alt=""></div>'
            html += '<h4 class="post-title">'+item.titlecompany+'</h4>'
            html += '<p>'+item.detailcompany+'</p>'
            html += ' <a href="blog-details.html" class="readmore stretched-link bd"><span>Xem Thêm</span><i class="bi bi-arrow-right"></i></a>';
            html += '</div>';
            html += ' </div>';
            return html;
        }

    })
    document.getElementById('list__company').innerHTML = html;
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