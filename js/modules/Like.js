import $ from 'jquery';

class Like{
    constructor(){
        this.events();
    }

    events(){
        $(".like-box").on("click", this.ourClickDispatcher.bind(this));
    }

    // methods here
    ourClickDispatcher(e){
        var currentLikeBox = $(e.target).closest(".like-box");

        if(currentLikeBox.data('exists') == 'yes'){
            this.deleteLike(currentLikeBox);
        }
        else{
            this.createLike(currentLikeBox);
        }
    }

    createLike(currentLikeBox){
        var universityData = 'http://localhost:8090/fictional_university';
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
            },
            url: 'http://localhost:8090/fictional_university/wp-json/university/v1/manageLike',
            type: 'POST',
            data: {'professorID': currentLikeBox.data('professor')},
            success: (response) => {
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            }
        });
    }

    deleteLike(currentLikeBox){
        $.ajax({
            url: 'http://localhost:8090/fictional_university/wp-json/university/v1/manageLike',
            type: 'DELETE',
            success: (response) => {
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            }
        });
    }
}

export default Like;