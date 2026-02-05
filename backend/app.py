from flask import Flask, jsonify, request, send_from_directory
from flask_cors import CORS
import random, os

app = Flask(__name__, static_folder="../frontend", static_url_path="/")
CORS(app)

@app.route('/')
def index():
    return send_from_directory(app.static_folder, "index.html")

@app.route('/traffic_status')
def traffic_status():
    return jsonify({
        "status": random.choice(["Light", "Moderate", "Heavy"]),
        "speed": random.randint(20, 80)
    })

@app.route("/traffic_at_point", methods=["POST"])
def traffic_at_point():
    data = request.get_json()
    lat, lon = data.get("lat"), data.get("lon")
    if lat is None or lon is None:
        return jsonify({"error": "Invalid coordinates"}), 400
    
    vehicle_count = random.randint(20, 250)
    avg_speed = random.uniform(15, 70)
    congestion_level = (
        "Low" if vehicle_count < 80 else 
        "Medium" if vehicle_count < 160 else "High"
    )
    light_color = random.choice(["🟥 Red", "🟨 Yellow", "🟩 Green"])

    return jsonify({
        "lat": lat,
        "lon": lon,
        "vehicle_count": vehicle_count,
        "avg_speed": round(avg_speed, 1),
        "congestion_level": congestion_level,
        "traffic_light": light_color
    })

if __name__ == '__main__':
    app.run(debug=True)
