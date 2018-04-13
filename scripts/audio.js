const audio = document.querySelector('audio')
const playbutton = document.querySelector('.play')
const pausebutton = document.querySelector('.pause')
let isPlaying = true

// Listen to click event on button
playbutton.addEventListener('click', () => {

    if (audio.duration > 0 && !isPlaying) {

        audio.play()
        document.getElementById("playIcon").classList.remove('fa-pause')
        document.getElementById("playIcon").classList.add('fa-pause')
        isPlaying = true

    } else if (audio.duration > 0 && isPlaying) {
        audio.pause()
        document.getElementById("playIcon").classList.remove('fa-play')
        document.getElementById("playIcon").classList.add('fa-play')
        isPlaying = false
    }
})

const $soundLine = document.querySelector('.player .timeline .soundline .current')
const $audio = document.querySelector('audio')

setInterval(() => {
    let progress = $audio.currentTime / $audio.duration
    $soundLine.style.width = `${progress*100}%`
}, 50)