<style>
.carousel-inner {
    display: flex;
    transition: transform 0.5s ease;
}

.carousel-slide {
    width: 100%;
    flex-shrink: 0;
    position: relative;
}

.carousel {
    position: relative;
    width: 100%;
    max-width: 1270px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 8px;
}

.carousel img {
    width: 100%;
    height: 72%; 
    object-fit: cover; 
}

.carousel-caption {
    position: absolute;
    bottom: 40%;
    left: 50%;
    transform: translateX(-50%);
    background-color: transparent;
    color: #0000
    padding: 1.5rem; 
    border-radius: 8px;
    max-width: 70%;
    text-align: center;
    box-shadow: transparent;
    font-family: 'Open Sans', sans-serif; 
}

.carousel-caption h2 {
    font-size: 2.5rem; 
    margin-bottom: 0.5rem;
}

.carousel-caption p {
    font-size: 1.5rem; 
}
</style>