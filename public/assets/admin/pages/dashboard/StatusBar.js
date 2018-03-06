
class StatusBar {

    constructor(id, message, icon, iconLabelClass) {

        this.container = $('#status-bars-container');

        this.id = id;
        this.message = message;
        this.icon = icon;
        this.iconLabelClass = iconLabelClass ? iconLabelClass : 'label-success';

        this.linkUrl = null;
        this.linkText = null;
        this.linkClickCallback = null;
        this.date = null;
    }

    setIcon(icon, iconLabelClass) {
        this.icon = icon;

        if (iconLabelClass) {
            this.iconLabelClass = iconLabelClass;
        }
    }

    setMessage(message) {
        this.message = message;
    }

    setDate(dateText) {
        this.date = dateText;
    }

    setLink(url, text, callback) {

        if (url) {
            this.linkUrl = url;
            this.linkText = text;
            this.linkClickCallback = callback;
        } else {
            this.linkUrl = null;
            this.linkText = null;
            this.linkClickCallback = null;
        }

    }

    bindEvents() {
        if (this.linkClickCallback) {
            $(`.status-bar-link[data-id=${this.id}]`).click(this.linkClickCallback);
        }
    }

    render() {
        const html = tmpl('status-bar-item-tmpl', this);

        if (this.isRendered()) {
            $(`.status-bar-li[data-id=${this.id}]`).replaceWith(html);
        } else {
            this.container.append(html);
        }

        this.bindEvents();
    }

    pulsate() {
        let color = $(`.status-bar-icon-label[data-id=${this.id}]`).css('background');
        $(`.status-bar-li[data-id=${this.id}]`).pulsate({
            color: color, // warning color
            reach: 10, // how far the pulse goes in px
            speed: 500, // how long one pulse takes in ms
            pause: 500, // how long the pause between pulses is in ms
            glow: true, // if the glow should be shown too
            repeat: true, // will repeat forever if true, if given a number will repeat for that many times
            onHover: false // if true only pulsate if user hovers over the element
        });
    }

    isRendered() {
        return $(`.status-bar-li[data-id=${this.id}]`).length > 0;
    }

    remove() {
        $(`.status-bar-li[data-id=${this.id}]`).remove();
    }

}
