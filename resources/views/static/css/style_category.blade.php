<style>
    .icon-cards img{
        width: 100%;
        height: auto;
    }

    .container-cards {
        width: 1000px;
        position: relative;
        display: ruby;
        justify-content: space-between;
    }

    .container-cards .card-cards {
        padding: 0px 10px;
        position: relative;
        border-radius: 10px;
    }

    .container-cards .card-cards .icon-cards {
        /* position: absolute; */
        top: 0;
        left: 0;
        width: 100%;
        /* height: 100%; */
        background: rgb(255, 255, 255);
        transition: 0.7s;
        z-index: 1;
    }

    .container-cards .card-cards:nth-child(1) .icon-cards {
        background: #e07768;
    }

    .container-cards .card-cards:nth-child(2) .icon-cards {
        background: #6eadd4;
    }

    .container-cards .card-cards:nth-child(3) .icon-cards {
        background: #4aada9;
    }

    .container-cards .card-cards .icon-cards .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 80px;
        transition: 0.7s;
        color: #fff;
    }

    .container-cards .card-cards .face-cards {
        width: 300px;
        height: 200px;
        transition: 0.5s;
    }

    .container-cards .card-cards .face-cards.face1-cards {
        position: relative;
        /* background: #333; */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
        transform: translateY(100px);
    }

    .container-cards .card-cards:hover .face-cards.face1-cards {
        background: #ff0057;
        transform: translateY(0px);
    }

    .container-cards .card-cards .face-cards.face1-cards .content-cards {
        opacity: 1;
        transition: 0.5s;
    }

    .container-cards .card-cards:hover .face-cards.face1-cards .content-cards {
        opacity: 1;
    }

    .container-cards .card-cards .face-cards.face1-cards .content-cards i {
        max-width: 100px;
    }

    .container-cards .card-cards .face-cards.face2-cards {
        position: relative;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        box-sizing: border-box;
        box-shadow: -5px -5px 25px rgba(0, 0, 0, 0.8);
        transform: translateY(-100px);
    }

    .container-cards .card-cards:hover .face-cards.face2-cards {
        transform: translateY(0);
    }

    .container-cards .card-cards .face-cards.face2-cards .content-cards p {
        margin: 0;
        padding: 0;
        text-align: center;
        color: #414141;
    }

    .container-cards .card-cards .face-cards.face2-cards .content-cards h3 {
        margin: 0 0 10px 0;
        padding: 0;
        color: #fff;
        font-size: 24px;
        text-align: center;
        color: #414141;
    }

    .container-cards a {
        text-decoration: none;
        color: #414141;
    }

    .content-cards button {
        display: block;
        margin: 0 auto;
    }
    
</style>
