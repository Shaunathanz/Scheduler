var page; //current page title

window.onload = function()
{
    page = document.getElementById('tab_name').innerText;
    console.log('Current Page: ' + page);
    switch(page)
    {
        case 'Scheduler':
            //
            break;
        default:
            //
            break;
    }

    console.log("Created by Shaun Graham for ICS 325-01");
}

/**
 * navigate to a new page in current tab
 */
function goToPage(item)
{
    var location = "../index.html"; //homepage default value
    switch(item)
    {
        case 'home':
            {
                break;
            }
        default:
            {
                console.log("Invalid page name in switch case! Going to homepage.");
            }
    }
    window.open(location, "_self");
}