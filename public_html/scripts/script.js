/* ADD NEW CODE TO BOTTOM OF FILE */

var page; //current page title

/**
 * Put window.onload implementation in switch case
 */
window.onload = function()
{
    page = document.getElementById('tab_name').innerText;
    console.log('Current Page: ' + page);
    switch(page)
    {
        case 'Splash':
            break;
        case 'Test':
            document.getElementById('logo').style.backgroundColor = "#026824";
        default:
            break;
    }

    console.log("Created by Shaun Graham for ICS 325-01");
}

/**
 * navigate to a new page in current tab
 */
function goToPage(item)
{
    var location = "../index.php"; //homepage default value
    switch(item)
    {
        case 'home':
            {
                if(page == "Splash")
                {
                    location = "index.php";
                }
                break;
            }
        case 'tutor-home':
            {
                location = "pages/tutor-home.php";
                break;
            }
        case 'student-home':
            {
                location = "pages/student-home.php";
                break;
            }
        case 'test':
            {
                location = "pages/test.html";
                break;
            }
        default:
            {
                console.log("Invalid page name in switch case! Going to homepage.");
            }
    }
    window.open(location, "_self");
}

/* V ADD NEW CODE BELOW THIS LINE v */

