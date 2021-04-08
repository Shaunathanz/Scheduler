/* ADD NEW FUNCTIONS TO BOTTOM OF FILE */

var page; //current page title
var current_popup; //last displayed popup

/**
 * Put window.onload implementation in switch case
 */
window.onload = function()
{
    page = document.getElementById('tab_name').innerText;
    console.log('Current Page: ' + page);
    
    // #logo-text changes for each page except the splash page 
    if(page != 'Splash')
    {
        document.getElementById('logo-text').innerText = page;
    }

    try 
    {
        document.getElementById("popupBG").addEventListener("click", function(){hidePopup()});
    } catch (Exception)
    {
        console.log("ERROR: Can't add event listener to popupBG!");
    }

    // page onload code
    switch(page)
    {
        case 'Splash':
            document.getElementById('logo').addEventListener("click", function(){goToPage("home");});
            document.getElementById('logo').style.backgroundColor = "darkred";
            break;
        case 'Tutor':
            document.getElementById('logo').addEventListener("click", function(){goToPage("tutor-home");});
            break;
        case 'Calendar':
            document.getElementById('logo').addEventListener("click", function(){goToPage("tutor-home");});
            break;
        case 'Profile':
            document.getElementById('logo').addEventListener("click", function(){goToPage("tutor-home");});
            break;
        case 'Profile Registration':
            document.getElementById('logo').addEventListener("click", function(){goToPage("home");});
            break;
        case 'Appointments':
            document.getElementById('logo').addEventListener("click", function(){goToPage("tutor-home");});
            break;
        case 'Sections':
            document.getElementById('logo').addEventListener("click", function(){goToPage("tutor-home");});
            break;
        case 'Student':
            document.getElementById('logo').addEventListener("click", function(){goToPage("home");});
            document.getElementById('logo').style.backgroundColor = "#006B40";
            break;
        case 'Test':
            document.getElementById('logo').addEventListener("click", function(){goToPage("home");});
            document.getElementById('logo').style.backgroundColor = "#026824";
        default:
            break;
    }

    console.log("Created by Group 10 for ICS 325-01");
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
                } //else default value should apply
                break;
            }
        case 'tutor-home':
            {
                if(page == "Splash")
                {
                    location = "pages/tutor-home.php";
                } else {
                    location = "tutor-home.php";
                }
                break;
            }
        case 'tutor-calendar':
            {
                location = "tutor-calendar.php";
                break;
            }
        case 'tutor-appointments':
            {
                location = "tutor-appointments.php";
                break;
            }
        case 'tutor-sections':
            {
                location = "tutor-sections.php";
                break;
            }
        case 'tutor-profile':
            {
                location = "tutor-profile.php";
                break;
            }
        case 'register':
            {
                location = "pages/tutor-register.php";
                break;
            }
        case 'student-home':
            {
                if(page == "Splash")
                {
                    location = "pages/student-home.php";
                } else
                {
                    location = "student-home.php"; // == "refresh page"
                }

                break;
            }
        case 'splash': //doubles as logout function (TO DO)
            {
                //logout code here
                page = "../index.php";
                break;
            }
        case 'test':
            {
                location = "pages/test.html";
                break;
            }
        default:
            {
                console.log("Invalid page name in switch case! Argument = \"" + item + "\". Check script.js. Going to homepage.");
            }
    }
    window.open(location, "_self");
}

function btnSelected(btnSelectedName)
{
    switch(btnSelectedName)
    {
        case 'tutor':
            {
                document.getElementById("splash-btn-student").style.display = "none";
                document.getElementById("login").style.display = "block";
                break;
            }
        case 'student':
            {
                goToPage('student-home');
                break;
            }
        default:
            {
                console.log("Invlid argument passed to function btnSelected()!");
            }
    }
}

/**Take an element id and set display to "block" */
function showPopup(id)
{
    current_popup = document.getElementById(id);
    current_popup.style.display = "block";
    document.getElementById("popupBG").style.display = "block";
}

/**Hide current popup */
function hidePopup()
{
    document.getElementById("popupBG").style.display = "none";
    current_popup.style.display = "none";
}

/* V ADD NEW FUNCTIONS BELOW THIS LINE v */

