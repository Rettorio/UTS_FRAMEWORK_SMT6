import { DateTime, TempusDominus, Namespace } from '@eonasdan/tempus-dominus';
import '@eonasdan/tempus-dominus/dist/css/tempus-dominus.min.css';  
import { popper } from '@popperjs/core';
const dttpProps = {
    localization: {
        locale: 'id',
        format: 'yyyy-MM-dd HH:mm', 
    },
    display: {
        icons: {
            type: 'icons',
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-arrow-up',
            down: 'fa fa-arrow-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-calendar-check',
            clear: 'fa fa-trash',
            close: 'fa fa-xmark'
        },
        components: {
            decades: true,
            year: true,
            month: true,
            date: true,
            hours: true,
            minutes: true,
        },
        theme: 'light',
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const linkedPicker1Element = document.getElementById("datetimepicker1");
    let startDatePicker = new TempusDominus(linkedPicker1Element, { ...dttpProps,     restrictions: {
        minDate: new DateTime()
    }, });

    let endDatePicker =  new TempusDominus(document.getElementById("datetimepicker2"),{ ...dttpProps, useCurrent: false});

    linkedPicker1Element.addEventListener(Namespace.events.change, (e) => { 
        console.log("previous date :" + e.detail.date.getDate());
        const newDate = new Date();
        newDate.setDate(e.detail.date.getDate() + 1);
        console.log("current date :" + newDate.getDate());
            endDatePicker.updateOptions({
                restrictions: {
                    minDate: newDate,
                },
            });
    });

    //using subscribe method
    const subscription = endDatePicker.subscribe(Namespace.events.change, (e) => {
    startDatePicker.updateOptions({
        restrictions: {
        maxDate: e.date,
        },
    });
    });
})
